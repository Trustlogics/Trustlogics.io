<?php
/*
 * We are conducting a Surprise Box Sale – the first of its kind in the rapidly growing world of token generation events – 
 * to celebrate our early contributors for their vision and confidence in supporting the growth of innovative technology and 
 * early-stage companies. In the Surprise Box Sale, $1,000,000 worth of TrustLogics Tokens (TLT) will be distributed among early 
 * contributors in the form of unique digital scratch cards through a lucky draw. 
 */

//First, the total number of scratch cards is ascertained.
$scratch_cards_count = $_POST['scratch_cards_count'];
//Then the required number of arrays are initialized to undertake Scratch Card Generation.
$all_cards_serials = $scratch_cards = $winners_12500 = $winners_6250 = $winners_3125 = $winners_1500 = $winners_700 = $winners_600 = $winners_550 = $winners_200 = $winners_100 = $winners_50 = array();
//Using the range method, an array will be created for the required number of scratch cards
$all_cards_serials = $scratch_cards = range(1, $scratch_cards_count);
//To enable the picking of scratch cards in a random manner, all of them are shuffled.
shuffle($scratch_cards);

//Once the shuffling is done, the first 50 cards will be selected to receive 12,500 TLT, 
$winners_12500 = array_slice($scratch_cards, 0,50, TRUE);

//the next 50 cards will be selected to receive 6,250 TLT, 
$winners_6250 = array_slice($scratch_cards, 0,50, TRUE);

//the next 50 cards will be selected to receive 3,125 TLT, 
$winners_3125 = array_slice($scratch_cards, 0,50, TRUE);

//the next 150 cards will be selected to receive 1,500 TLT, 
$winners_1500 = array_slice($scratch_cards, 0,150, TRUE);

//the next 200 cards will be selected to receive 700 TLT, 
$winners_700 = array_slice($scratch_cards, 0,200, TRUE);

//the next 500 cards will be selected to receive 600 TLT, 
$winners_600 = array_slice($scratch_cards, 0,500, TRUE);

//the next 1000 cards will be selected to receive 550 TLT, 
$winners_550 = array_slice($scratch_cards, 0,1000, TRUE);

//the next 2,000 cards will be selected to receive 200 TLT, 
$winners_200 = array_slice($scratch_cards, 0,2000, TRUE);

//the next 3000 cards will be selected to receive 100 TLT, 
$winners_100 = array_slice($scratch_cards, 0,3000, TRUE);

//and then the following 3000 cards will be selected to receive 50 TLT.
$winners_50 = array_slice($scratch_cards, 0,3000, TRUE);

/*
 * The selected cards will be assigned the corresponding values listed above, 
 * and the leftover cards (everything except the 10,000 which have been selected) will be assigned a value of zero.
 */
for ($i = 0; $i < count($all_cards_serials); $i++) {
    if (in_array($all_cards_serials[$i], $winners_12500)) {
        $coupon_value = 12500;
    } else if (in_array($all_cards_serials[$i], $winners_6250)) {
        $coupon_value = 6250;
    } else if (in_array($all_cards_serials[$i], $winners_3125)) {
        $coupon_value = 3125;
    } else if (in_array($all_cards_serials[$i], $winners_1500)) {
        $coupon_value = 1500;
    } else if (in_array($all_cards_serials[$i], $winners_700)) {
        $coupon_value = 700;
    }else if (in_array($all_cards_serials[$i], $winners_600)) {
        $coupon_value = 600;
    }else if (in_array($all_cards_serials[$i], $winners_550)) {
        $coupon_value = 550;
    }else if (in_array($all_cards_serials[$i], $winners_200)) {
        $coupon_value = 200;
    }else if (in_array($all_cards_serials[$i], $winners_100)) {
        $coupon_value = 100;
    }else if (in_array($all_cards_serials[$i], $winners_50)) {
        $coupon_value = 50;
    } else {
        $coupon_value = 0;
    }
    $all_cards_serials[$i] = $coupon_value;
}
echo json_encode($all_cards_serials);