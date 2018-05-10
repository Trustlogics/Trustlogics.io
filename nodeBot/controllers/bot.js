'use strict';

const Telegram = require('telegram-node-bot');

class BotController extends Telegram.TelegramBaseController {
    /**
     * @param {Scope} $
     */
    icoHandler($) {
        $.sendMessage('Start Date : 01 September 2018\nEnd Date : 25 September 2018\n ')
    }

    preIcoHandler($) {
        $.sendMessage('Start Date : 30 May 2018\nEnd Date : 14 August 2018\n ')
    }

    startDateHandler($) {
        $.sendMessage('ICO : 01 September 2018\nPre ICO : 30 May 2018\n ')
    }

    endDateHandler($) {
        $.sendMessage('ICO : 25 September 2018\nPre ICO : 14 August 2018\n')
    }

    tokenSupplyHandler($) {
        $.sendMessage('Total Token Supply : 427,224,610')
    }

    tokenSaleHandler($) {
        $.sendMessage('Tokens for Sale : 234,973,535')
    }

    tokenPriceHandler($) {
        $.sendMessage('Pre ICO Price : $0.052\nCrowdsale price - $0.08')
    }

    airdropHandler($) {
        $.sendMessage('Trustlogics Airdrop is closed now')
    }

    bountyHandler($) {
        $.sendMessage('https://bitcointalk.org/index.php?topic=3439509.0\nhttps://t.me/trustlogics_bounty')
    }

    supportHandler($){
        $.sendMessage('support@trustlogics.io')
    }

    tokenSymbolHandler($){
        $.sendMessage('Token Symbol: TLT ')
    }

    acceptedCurrenciesHandler($){
        $.sendMessage('Accepted Currencies : ETH, BTC, BCH, LTC')
    }

    helpHandler($){
        $.sendMessage('List of all Commands\n/ico\n/preIco\n/startDate\n/endDate\n/tokenSupply\n/tokenSale\n/tokenPrice\n/airdrop\n/bounty\n/support\n/tokenSymbol\n/acceptedCurrencies')
    }

    get routes() {
        return this._commandList()
    }

    _commandList(){
        return {
            'icoCommand'        : 'icoHandler',
            'preIcoCommand'     : 'preIcoHandler',
            'startDateCommand'  : 'startDateHandler',
            'endDateCommand'    : 'endDateHandler',
            'tokenSupplyCommand': 'tokenSupplyHandler',
            'tokenSaleCommand'  : 'tokenSaleHandler',
            'tokenPriceCommand' : 'tokenPriceHandler',
            'airdropCommand'    : 'airdropHandler',
            'bountyCommand'     : 'bountyHandler',
            'supportCommand'    : 'supportHandler',
            'helpCommand'       : 'helpHandler',
            'tokenSymbolCommand': 'tokenSymbolHandler',
            'acceptedCurrenciesCommand': 'acceptedCurrenciesHandler' 
        }
    }
}
module.exports = BotController;