pragma solidity 0.4.23;

/**
 * @title SafeMath
 * @dev Math operations with safety checks that throw on error
 */
library SafeMath {
    function mul(uint256 a, uint256 b) internal pure returns(uint256) {
        if (a == 0) {
            return 0;
        }
        uint256 c = a * b;
        assert(c / a == b);
        return c;
    }

    function div(uint256 a, uint256 b) internal pure returns(uint256) {
        assert(b > 0); // Solidity automatically throws when dividing by 0
        uint256 c = a / b;
        assert(a == b * c + a % b); // There is no case in which this doesn't hold
        return c;
    }

    function sub(uint256 a, uint256 b) internal pure returns(uint256) {
        assert(b <= a);
        return a - b;
    }

    function add(uint256 a, uint256 b) internal pure returns(uint256) {
        uint256 c = a + b;
        assert(c >= a);
        return c;
    }
}

contract ERC20
{
    function totalSupply()public view returns(uint total_Supply);
    function balanceOf(address who)public view returns(uint256);
    function allowance(address owner, address spender)public view returns(uint);
    function transferFrom(address from, address to, uint value)public returns(bool ok);
    function approve(address spender, uint value)public returns(bool ok);
    function transfer(address to, uint value)public returns(bool ok);
    event Transfer(address indexed from, address indexed to, uint value);
    event Approval(address indexed owner, address indexed spender, uint value);
}




contract TrustLogics is ERC20
{
    using SafeMath for uint256;

   
    uint256 constant public TOKEN_DECIMALS = 10 ** 18;
    uint256 constant public ETH_DECIMALS = 10 ** 18;
    uint256 public TotalCrowdsaleSupply = 234973535; 
    uint256 public TotalOwnerSupply = 192251075;     
   

    // Name of the token
    string public constant name = "TrustLogics Token";

    // Symbol of token
    string public constant symbol = "TLT";

    uint8 public constant decimals = 18;

    uint public TotalTokenSupply = 427224610 * TOKEN_DECIMALS;  //

    // Owner of this contract
    address public owner;
    
    address public TrustLogicsCrowdsale;
    bool public mintedCrowdsale;
   
 
    mapping(address => mapping(address => uint)) allowed;
    mapping(address => uint) balances;
 
    modifier onlyOwner() {
        require(msg.sender == owner);
        _;
    }
    
    constructor() public
    {
       
        owner = msg.sender;
        balances[owner] = TotalOwnerSupply.mul(TOKEN_DECIMALS);
        emit  Transfer(0, owner, balances[owner]);
    }
    
    function mint(address _TrustlogicsCrowdSale) public onlyOwner{
        require(!mintedCrowdsale);
        TrustLogicsCrowdsale = _TrustlogicsCrowdSale;
        balances[TrustLogicsCrowdsale] = TotalCrowdsaleSupply.mul(TOKEN_DECIMALS);
        mintedCrowdsale = true;
        emit Transfer(0,TrustLogicsCrowdsale,  balances[TrustLogicsCrowdsale]);
    }

    // what is the total supply of the ech tokens
    function totalSupply() public view returns(uint256 total_Supply) {
        total_Supply = TotalTokenSupply;
    }

    // What is the balance of a particular account?
    function balanceOf(address token_Owner)public constant returns(uint256 balance) {
        return balances[token_Owner];
    }

    // Send _value amount of tokens from address _from to address _to
    // The transferFrom method is used for a withdraw workflow, allowing contracts to send
    // tokens on your behalf, for example to "deposit" to a contract address and/or to charge
    // fees in sub-currencies; the command should fail unless the _from account has
    // deliberately authorized the sender of the message via some mechanism; we propose
    // these standardized APIs for approval:
    function transferFrom(address from_address, address to_address, uint256 tokens)public returns(bool success)
    {
        require(to_address != 0x0);
        require(balances[from_address] >= tokens && allowed[from_address][msg.sender] >= tokens && tokens >= 0);
        balances[from_address] = (balances[from_address]).sub(tokens);
        allowed[from_address][msg.sender] = (allowed[from_address][msg.sender]).sub(tokens);
        balances[to_address] = (balances[to_address]).add(tokens);
        emit Transfer(from_address, to_address, tokens);
        return true;
    }

    // Allow _spender to withdraw from your account, multiple times, up to the _value amount.
    // If this function is called again it overwrites the current allowance with _value.
    function approve(address spender, uint256 tokens)public returns(bool success)
    {
        require(spender != 0x0);
        allowed[msg.sender][spender] = tokens;
        emit Approval(msg.sender, spender, tokens);
        return true;
    }

    function allowance(address token_Owner, address spender) public constant returns(uint256 remaining)
    {
        require(token_Owner != 0x0 && spender != 0x0);
        return allowed[token_Owner][spender];
    }

    // Transfer the balance from owner's account to another account
    function transfer(address to_address, uint256 tokens)public returns(bool success)
    {
        require(to_address != 0x0);
        require(balances[msg.sender] >= tokens && tokens >= 0);
        balances[msg.sender] = (balances[msg.sender]).sub(tokens);
        balances[to_address] = (balances[to_address]).add(tokens);
        emit Transfer(msg.sender, to_address, tokens);
        return true;
    }
    
     function transferby(address _to,uint256 _amount) external onlyOwner returns(bool success) {
        require( _to != 0x0); 
        require( balances[TrustLogicsCrowdsale] >= _amount && _amount > 0);
        balances[TrustLogicsCrowdsale] = ( balances[TrustLogicsCrowdsale]).sub(_amount);
        balances[_to] = (balances[_to]).add(_amount);
        emit Transfer(address(this), _to, _amount);
        return true;
    }
}
