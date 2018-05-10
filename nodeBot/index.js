'use strict'
require('dotenv').config()
const Telegram          = require('telegram-node-bot');
const tg                = new Telegram.Telegram(process.env.TELEGRAM_TOKEN);
const BotController     = require('./controllers/bot');
const botCtrl           = new BotController();

tg.router.when(new Telegram.TextCommand('/ico',     'icoCommand'), botCtrl)
         .when(new Telegram.TextCommand('/preIco',  'preIcoCommand'), botCtrl)
         .when(new Telegram.TextCommand('/startDate','startDateCommand'), botCtrl)
         .when(new Telegram.TextCommand('/endDate',  'endDateCommand'), botCtrl)
         .when(new Telegram.TextCommand('/tokenSupply','tokenSupplyCommand'), botCtrl)
         .when(new Telegram.TextCommand('/tokenSale', 'tokenSaleCommand'), botCtrl)
         .when(new Telegram.TextCommand('/tokenPrice','tokenPriceCommand'), botCtrl)
         .when(new Telegram.TextCommand('/airdrop', 'airdropCommand'), botCtrl)
         .when(new Telegram.TextCommand('/bounty',  'bountyCommand'), botCtrl)
         .when(new Telegram.TextCommand('/support', 'supportCommand'), botCtrl)
         .when(new Telegram.TextCommand('/help', 'helpCommand'), botCtrl)
         .when(new Telegram.TextCommand('/tokenSymbol', 'tokenSymbolCommand'), botCtrl)
         .when(new Telegram.TextCommand('/acceptedCurrencies', 'acceptedCurrenciesCommand'), botCtrl);

