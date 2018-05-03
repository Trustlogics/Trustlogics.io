<?php

/*
 * $50,000 worth of TrustLogics Tokens (TLT) in the Bounty program will be distributed among bounty hunters in the form of 
 * unique digital scratch cards through a lucky draw. 
 */
//First, the total number of scratch cards is ascertained.
$scratch_cards_count = $_POST['scratch_cards_count'];
//Then the required number of arrays are initialized to undertake Scratch Card Generation.
$scratch_cards = $all_cards_serials = $five_winners = $ten_winners = $thirty_five_winners = $fourty_winners = $fourty_five_winners = $response = array();
//Using the range method, an array will be created for the required number of scratch cards
$all_cards_serials = $scratch_cards = range(1, $scratch_cards_count);
//To enable the picking of scratch cards in a random manner, all of them are shuffled.
shuffle($scratch_cards);

//Once the shuffling is done, the first 5 cards will be selected to receive $2,000 worth of TLT, 
$five_winners = array_slice($scratch_cards, 0,5, TRUE);

//the next 10 cards will be selected to receive $1,000 in TLT, 
$ten_winners = array_slice($scratch_cards, 0,10, TRUE);

//the next 35 cards will be selected to receive $500 in TLT, 
$thirty_five_winners = array_slice($scratch_cards, 0,35, TRUE);

//the next 40 cards will be selected to receive $200 in TLT, 
$fourty_winners = array_slice($scratch_cards, 0,40, TRUE);

//and the following 45 cards will be selected to receive $100 in TLT.
$fourty_five_winners = array_slice($scratch_cards, 0,45, TRUE);

/*
 * The selected cards will be assigned the corresponding values listed above, 
 * and the leftover cards (everything except the 135 which have been selected) will be assigned a value of zero.
 */
for($i=0; $i< count($all_cards_serials); $i++){
    if(in_array($all_cards_serials[$i], $five_winners)){
        $coupon_value = 2000;
    }else if(in_array($all_cards_serials[$i], $ten_winners)){
        $coupon_value = 1000;
    } else if(in_array($all_cards_serials[$i], $thirty_five_winners)){
        $coupon_value = 500;
    } else if(in_array($all_cards_serials[$i], $fourty_winners)){
        $coupon_value = 200;
    } else if(in_array($all_cards_serials[$i], $fourty_five_winners)){
        $coupon_value = 100;
    }else{
        $coupon_value = 0;
    }
    $response [] = array($i+1 => $coupon_value);
}
echo json_encode(array('scratch_cards'=>$response));