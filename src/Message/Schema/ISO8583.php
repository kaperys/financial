<?php

namespace Kaperys\Financial\Message\Schema;

/**
 * Class ISO8583 (1987 spec)
 *
 * @package Kaperys\Financial\Message
 *
 * @author  Mike Kaperys <mike@kaperys.io>
 */
class ISO8583 implements MessageSchemaInterface
{

    const SCHEMA_NAME = 'ISO8583';

    /**
     * @var string
     *
     * @bit             2
     * @display         n
     * @minLength       15
     * @maxLength       19
     * @description     "Primary account number (PAN)"
     * @format          LLVAR
     * @lengthIndicator 2
     */
    protected $pan;

    /**
     * @var int
     *
     * @bit     3
     * @display n
     * @length  6
     * @description "Processing Code"
     */
    protected $processingCode;

    /**
     * @var int
     *
     * @bit     4
     * @display n
     * @length  12
     * @description "Amount Transaction"
     */
    protected $amountTransaction;

    /**
     * @var int
     *
     * @bit     5
     * @display n
     * @length  12
     * @description "Amount Settlement"
     */
    protected $amountSettlement;

    /**
     * @var int
     *
     * @bit     6
     * @display n
     * @length  12
     * @description "Amount Cardholder billing"
     */
    protected $amountCardholderBilling;

    /**
     * @var string
     *
     * @bit     7
     * @display n
     * @length  10
     * @description "Date and time transmission"
     * @format  mdHis
     */
    protected $transmissionDateTime;

    /**
     * @var int
     *
     * @bit     8
     * @display n
     * @length  8
     * @description "Amount Cardholder billing fee"
     */
    protected $cardholderBillingFee;

    /**
     * @var int
     *
     * @bit     9
     * @display n
     * @length  8
     * @description "Conversion rate settlement"
     */
    protected $conversionRate;

    /**
     * @var int
     *
     * @bit     10
     * @display n
     * @length  8
     * @description "Conversion rate cardholder billing"
     */
    protected $conversionRateCardholderBilling;

    /**
     * @var int
     *
     * @bit     11
     * @display n
     * @length  6
     * @description "Systems trace audit number"
     */
    protected $systemsTraceAuditNumber;

    /**
     * @var string
     *
     * @bit     12
     * @display n
     * @length  6
     * @description "Local transaction time"
     * @format  His
     */
    protected $localTransactionTime;

    /**
     * @var string
     *
     * @bit     13
     * @display n
     * @length  4
     * @description "Local transaction date"
     * @format  md
     */
    protected $localTransactionDate;

    /**
     * @var string
     *
     * @bit     14
     * @display n
     * @length  4
     * @description "Expiration date"
     * @format  ym
     */
    protected $expirationDate;

    /**
     * @var string
     *
     * @bit     15
     * @display n
     * @length  4
     * @description "Settlement date"
     * @format  md
     */
    protected $settlementDate;

    /**
     * @var string
     *
     * @bit     16
     * @display n
     * @length  4
     * @description "Conversion date"
     * @format  md
     */
    protected $conversionDate;

    /**
     * @var string
     *
     * @bit     17
     * @display n
     * @length  4
     * @description "Capture date"
     * @format  md
     */
    protected $captureDate;

    /**
     * @var int
     *
     * @bit     18
     * @display n
     * @length  4
     * @description "Merchant type"
     */
    protected $merchantType;

    /**
     * @var int
     *
     * @bit     19
     * @display n
     * @length  3
     * @description "Acquiring institution country code"
     */
    protected $countryCodeAcquiring;

    /**
     * @var int
     *
     * @bit     20
     * @display n
     * @length  3
     * @description "Primary account number (PAN) extended country code"
     */
    protected $panCountryCode;

    /**
     * @var int
     *
     * @bit     21
     * @display n
     * @length  3
     * @description "Forwarding institution country code"
     */
    protected $forwardingCountryCode;

    /**
     * @var int
     *
     * @bit     22
     * @display n
     * @length  3
     * @description "Point of service entry mode"
     */
    protected $pointOfServiceEntryMode;

    /**
     * @var int
     *
     * @bit     23
     * @display n
     * @length  3
     * @description "Card sequence number"
     */
    protected $cardSequenceNumber;

    /**
     * @var int
     *
     * @bit     24
     * @display n
     * @length  3
     * @description "Function code"
     */
    protected $functionCode;

    /**
     * @var int
     *
     * @bit     25
     * @display n
     * @length  2
     * @description "Point of service code condition"
     */
    protected $pointOfServiceCodeCondition;

    /**
     * @var int
     *
     * @bit     26
     * @display n
     * @length  2
     * @description "Point of service capture code"
     */
    protected $pointOfServiceCaptureCode;

    /**
     * @var int
     *
     * @bit     27
     * @display n
     * @length  1
     * @description "Authorisation identification response length"
     */
    protected $authorisationIdentificationResponseLength;

    /**
     * @var string
     *
     * @bit     28
     * @display an
     * @length  9
     * @description "Amount transaction fee"
     */
    protected $amountTransactionFee;

    /**
     * @var string
     *
     * @bit     29
     * @display an
     * @length  9
     * @description "Amount transaction settlement fee"
     */
    protected $amountTransactionSettlementFee;

    /**
     * @var string
     *
     * @bit     30
     * @display an
     * @length  9
     * @description "Amount transaction processing fee"
     */
    protected $amountTransactionProcessingFee;

    /**
     * @var string
     *
     * @bit     31
     * @display an
     * @length  9
     * @description "Amount settlement processing fee"
     */
    protected $amountSettlementProcessingFee;

    /**
     * @var int
     *
     * @bit       32
     * @display   n
     * @minLength 1
     * @maxLength 11
     * @description "Acquiring institution identification code"
     * @format    LLVAR
     */
    protected $acquiringInstitutionIdentificationCode;

    /**
     * @var int
     *
     * @bit       33
     * @display   n
     * @minLength 1
     * @maxLength 11
     * @description "Forwarding institution identification code"
     * @format    LLVAR
     */
    protected $forwardingInstitutionIdentificationCode;

    /**
     * @var int
     *
     * @bit       34
     * @display   n
     * @minLength 1
     * @maxLength 28
     * @description "Primary account number extended"
     * @format    LLVAR
     */
    protected $primaryAccountNumberExtended;

    /**
     * @var string
     *
     * @bit       35
     * @display   z
     * @minLength 1
     * @maxLength 37
     * @description "Track 2 data - ISO/IEC 7813"
     * @format    LLVAR
     */
    protected $track2Data;

    /**
     * @var string
     *
     * @bit       36
     * @display   n
     * @minLength 1
     * @maxLength 104
     * @description "Track 3 data - ISO/IEC 4909"
     * @format    LLLVAR
     */
    protected $track3Data;

    /**
     * @var string
     *
     * @bit     37
     * @display an
     * @length  12
     * @description "Retrieval reference number"
     */
    protected $retrievalReferenceNumber;

    /**
     * @var string
     *
     * @bit     38
     * @display an
     * @length  6
     * @description "Authorization identification response"
     */
    protected $authorizationIdentificationResponse;

    /**
     * @var string
     *
     * @bit     39
     * @display an
     * @length  2
     * @description "Response code"
     */
    protected $responseCode;

    /**
     * @var string
     *
     * @bit     40
     * @display an
     * @length  3
     * @description "Service restriction code"
     */
    protected $serviceRestrictionCode;

    /**
     * @var string
     *
     * @bit     41
     * @display ans
     * @length  8
     * @description "Card acceptor terminal identification"
     */
    protected $cardAcceptorTerminalIdentification;

    /**
     * @var string
     *
     * @bit     42
     * @display ans
     * @length  15
     * @description "Card acceptor identification code"
     */
    protected $cardAcceptorIdentificationCode;

    /**
     * @var string
     *
     * @bit     43
     * @display ans
     * @length  40
     * @description "Card acceptor name/location"
     */
    protected $cardAcceptorNameLocation;

    /**
     * @var string
     *
     * @bit       44
     * @display   an
     * @minLength 1
     * @maxLength 25
     * @description "Additional response data"
     * @format    LLVAR
     */
    protected $additionalResponseData;

    /**
     * @var string
     *
     * @bit       45
     * @display   an
     * @minLength 1
     * @maxLength 76
     * @description "Track 1 data"
     * @format    LLVAR
     */
    protected $track1Data;

    /**
     * @var string
     *
     * @bit       46
     * @display   an
     * @minLength 1
     * @maxLength 999
     * @description "Additional data ISO"
     * @format    LLLVAR
     */
    protected $additionalDataIso;

    /**
     * @var string
     *
     * @bit       47
     * @display   an
     * @minLength 1
     * @maxLength 999
     * @description "Additional data national"
     * @format    LLLVAR
     */
    protected $additionalDataNational;

    /**
     * @var string
     *
     * @bit       48
     * @display   an
     * @minLength 1
     * @maxLength 999
     * @description "Additional data private"
     * @format    LLLVAR
     */
    protected $additionalDataPrivate;

    /**
     * @var string
     *
     * @bit     49
     * @display n
     * @length  3
     * @description "Currency code transaction"
     */
    protected $currencyCodeTransaction;

    /**
     * @var string
     *
     * @bit     50
     * @display a
     * @length  3
     * @description "Currency code settlement"
     */
    protected $currencyCodeSettlement;

    /**
     * @var string
     *
     * @bit     51
     * @display a
     * @length  3
     * @description "Currency code cardholder billing"
     */
    protected $currencyCodeCardholderBilling;

    /**
     * @var string
     *
     * @bit     52
     * @display b
     * @length  8
     * @description "Personal identification number data (PIN)"
     */
    protected $personalIdentificationNumberData;

    /**
     * @var string
     *
     * @bit     53
     * @display n
     * @length  16
     * @description "Security related control information"
     */
    protected $securityRelatedControlInformation;

    /**
     * @var string
     *
     * @bit       54
     * @display   an
     * @minLength 1
     * @maxLength 120
     * @description "Additional amounts"
     * @format    LLLVAR
     */
    protected $additionalAmounts;

    /**
     * @var string
     *
     * @bit       55
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for ISO use 1"
     * @format    LLLVAR
     */
    protected $isoReserved1;

    /**
     * @var string
     *
     * @bit       56
     * @display   n
     * @minLength 1
     * @maxLength 4
     * @description "Reserved for ISO use 2"
     * @format    LLLVAR
     */
    protected $isoReserved2;

    /**
     * @var string
     *
     * @bit       57
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for national use 1"
     * @format    LLLVAR
     */
    protected $nationalReserved1;

    /**
     * @var string
     *
     * @bit       58
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for national use 2"
     * @format    LLLVAR
     */
    protected $nationalReserved2;

    /**
     * @var string
     *
     * @bit       59
     * @display   ans
     * @minLength 1
     * @maxLength 64
     * @description "Reserved for national use 3"
     * @format    LLLVAR
     */
    protected $nationalReserved3;

    /**
     * @var string
     *
     * @bit       60
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for private use 1"
     * @format    LLLVAR
     */
    protected $privateReserved1;

    /**
     * @var string
     *
     * @bit       61
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for private use 2"
     * @format    LLLVAR
     */
    protected $privateReserved2;

    /**
     * @var string
     *
     * @bit       62
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for private use 3"
     * @format    LLLVAR
     */
    protected $privateReserved3;

    /**
     * @var string
     *
     * @bit       63
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Reserved for private use 4"
     * @format    LLLVAR
     */
    protected $privateReserved4;

    /**
     * @var string
     *
     * @bit     64
     * @display b
     * @length  16
     * @description "Message authentication code (MAC)"
     */
    protected $messageAuthenticationCode;

    /**
     * @var int
     *
     * @bit     66
     * @display n
     * @length  1
     * @description "Settlement code"
     */
    protected $settlementCode;

    /**
     * @var int
     *
     * @bit     67
     * @display n
     * @length  2
     * @description "Extended payment code"
     */
    protected $extendedPaymentCode;

    /**
     * @var int
     *
     * @bit     68
     * @display n
     * @length  3
     * @description "Receiving institution country code"
     */
    protected $receivingInstitutionCountryCode;

    /**
     * @var int
     *
     * @bit     69
     * @display n
     * @length  3
     * @description "Settlement institution country code"
     */
    protected $settlementInstitutionCountryCode;

    /**
     * @var int
     *
     * @bit     70
     * @display n
     * @length  3
     * @description "Network management information code"
     */
    protected $networkManagementInformationCode;

    /**
     * @var int
     *
     * @bit     71
     * @display n
     * @length  4
     * @description "Message number"
     */
    protected $messageNumber;

    /**
     * @var int
     *
     * @bit     72
     * @display n
     * @length  4
     * @description "Message number, last"
     */
    protected $messageNumberLast;

    /**
     * @var string
     *
     * @bit     73
     * @display n
     * @length  6
     * @description "Date action"
     * @format  ymd
     */
    protected $dateAction;

    /**
     * @var int
     *
     * @bit     74
     * @display n
     * @length  10
     * @description "Credits number"
     */
    protected $creditsNumber;

    /**
     * @var int
     *
     * @bit     75
     * @display n
     * @length  10
     * @description "Credits reversal number"
     */
    protected $creditsReversalNumber;

    /**
     * @var int
     *
     * @bit     76
     * @display n
     * @length  10
     * @description "Debits number"
     */
    protected $debitsNumber;

    /**
     * @var int
     *
     * @bit     77
     * @display n
     * @length  10
     * @description "Debits reversal number"
     */
    protected $debitsReversalNumber;

    /**
     * @var int
     *
     * @bit     78
     * @display n
     * @length  10
     * @description "Transfer number"
     */
    protected $transferNumber;

    /**
     * @var int
     *
     * @bit     79
     * @display n
     * @length  10
     * @description "Transfer reversal number"
     */
    protected $transferReversalNumber;

    /**
     * @var int
     *
     * @bit     80
     * @display n
     * @length  10
     * @description "Inquiries number"
     */
    protected $inquiriesNumber;

    /**
     * @var int
     *
     * @bit     81
     * @display n
     * @length  10
     * @description "Authorisations number"
     */
    protected $authorisationsNumber;

    /**
     * @var int
     *
     * @bit     82
     * @display n
     * @length  12
     * @description "Credits processing fee amount"
     */
    protected $creditsProcessingFeeAmount;

    /**
     * @var int
     *
     * @bit     83
     * @display n
     * @length  12
     * @description "Credits transaction fee amount"
     */
    protected $creditsTransactionFeeAmount;

    /**
     * @var int
     *
     * @bit     84
     * @display n
     * @length  12
     * @description "Debits processing fee amount"
     */
    protected $debitsProcessingFeeAmount;

    /**
     * @var int
     *
     * @bit     85
     * @display n
     * @length  12
     * @description "Debits transaction fee amount"
     */
    protected $debitsTransactionFeeAmount;

    /**
     * @var int
     *
     * @bit     86
     * @display n
     * @length  16
     * @description "Credits amount"
     */
    protected $creditsAmount;

    /**
     * @var int
     *
     * @bit     87
     * @display n
     * @length  16
     * @description "Credits reversal amount"
     */
    protected $creditsReversalAmount;

    /**
     * @var int
     *
     * @bit     88
     * @display n
     * @length  16
     * @description "Debits amount"
     */
    protected $debitsAmount;

    /**
     * @var int
     *
     * @bit     89
     * @display n
     * @length  16
     * @description "Debits reversal amount"
     */
    protected $debitsReversalAmount;

    /**
     * @var string
     *
     * @bit     90
     * @display an
     * @length  42
     * @description "Original data elements"
     */
    protected $originalDataElements;

    /**
     * @var string
     *
     * @bit     91
     * @display an
     * @length  1
     * @description "File update code"
     */
    protected $fileUpdateCode;

    /**
     * @var int
     *
     * @bit     92
     * @display n
     * @length  2
     * @description "File security code"
     */
    protected $fileSecurityCode;

    /**
     * @var int
     *
     * @bit     93
     * @display an
     * @length  5
     * @description "Response indicator"
     */
    protected $responseIndicator;

    /**
     * @var string
     *
     * @bit     94
     * @display an
     * @length  7
     * @description "Service indicator"
     */
    protected $serviceIndicator;

    /**
     * @var string
     *
     * @bit     95
     * @display an
     * @length  42
     * @description "Replacement amounts"
     */
    protected $replacementAmounts;

    /**
     * @var string
     *
     * @bit     96
     * @display b
     * @length  64
     * @description "Message security code"
     */
    protected $messageSecurityCode;

    /**
     * @var int
     *
     * @bit     97
     * @display n
     * @length  16
     * @description "Amount net settlement"
     */
    protected $amountNetSettlement;

    /**
     * @var string
     *
     * @bit     98
     * @display ans
     * @length  25
     * @description "Payee"
     */
    protected $payee;

    /**
     * @var int
     *
     * @bit       99
     * @display   n
     * @minLength 1
     * @maxLength 11
     * @description "Settlement institution identification code"
     * @format    LLVAR
     */
    protected $settlementInstitutionIdentificationCode;

    /**
     * @var int
     *
     * @bit       100
     * @display   n
     * @minLength 1
     * @maxLength 11
     * @description "Receiving institution identification code"
     * @format    LLVAR
     */
    protected $receivingInstitutionIdentificationCode;

    /**
     * @var string
     *
     * @bit       101
     * @display   ans
     * @minLength 1
     * @maxLength 17
     * @description "File name"
     * @format    LLVAR
     */
    protected $fileName;

    /**
     * @var string
     *
     * @bit       102
     * @display   ans
     * @minLength 1
     * @maxLength 28
     * @description "Account identification 1"
     * @format    LLVAR
     */
    protected $accountIdentification1;

    /**
     * @var string
     *
     * @bit       103
     * @display   ans
     * @minLength 1
     * @maxLength 28
     * @description "Account identification 2"
     * @format    LLVAR
     */
    protected $accountIdentification2;

    /**
     * @var string
     *
     * @bit       104
     * @display   ans
     * @minLength 1
     * @maxLength 100
     * @description "Transaction description"
     * @format    LLLVAR
     */
    protected $transactionDescription;

    /**
     * @var string
     *
     * @bit       105
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 3"
     * @format    LLLVAR
     */
    protected $isoReserved3;

    /**
     * @var string
     *
     * @bit       106
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 4"
     * @format    LLLVAR
     */
    protected $isoReserved4;

    /**
     * @var string
     *
     * @bit       107
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 5"
     * @format    LLLVAR
     */
    protected $isoReserved5;

    /**
     * @var string
     *
     * @bit       108
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 6"
     * @format    LLLVAR
     */
    protected $isoReserved6;

    /**
     * @var string
     *
     * @bit       109
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 7"
     * @format    LLLVAR
     */
    protected $isoReserved7;

    /**
     * @var string
     *
     * @bit       110
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 8"
     * @format    LLLVAR
     */
    protected $isoReserved8;

    /**
     * @var string
     *
     * @bit       111
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "ISO reserved 9"
     * @format    LLLVAR
     */
    protected $isoReserved9;

    /**
     * @var string
     *
     * @bit       112
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 4"
     * @format    LLLVAR
     */
    protected $nationalReserved4;

    /**
     * @var string
     *
     * @bit       113
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 5"
     * @format    LLLVAR
     */
    protected $nationalReserved5;

    /**
     * @var string
     *
     * @bit       114
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 6"
     * @format    LLLVAR
     */
    protected $nationalReserved6;

    /**
     * @var string
     *
     * @bit       115
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 7"
     * @format    LLLVAR
     */
    protected $nationalReserved7;

    /**
     * @var string
     *
     * @bit       116
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 8"
     * @format    LLLVAR
     */
    protected $nationalReserved8;

    /**
     * @var string
     *
     * @bit       117
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 9"
     * @format    LLLVAR
     */
    protected $nationalReserved9;

    /**
     * @var string
     *
     * @bit       118
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 10"
     * @format    LLLVAR
     */
    protected $nationalReserved10;

    /**
     * @var string
     *
     * @bit       119
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "National reserved 11"
     * @format    LLLVAR
     */
    protected $nationalReserved11;

    /**
     * @var string
     *
     * @bit       120
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 5"
     * @format    LLLVAR
     */
    protected $privateReserved5;

    /**
     * @var string
     *
     * @bit       121
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 6"
     * @format    LLLVAR
     */
    protected $privateReserved6;

    /**
     * @var string
     *
     * @bit       122
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 7"
     * @format    LLLVAR
     */
    protected $privateReserved7;

    /**
     * @var string
     *
     * @bit       123
     * @display   an
     * @minLength 1
     * @maxLength 15
     * @description "Private reserved 8"
     * @format    LLLVAR
     */
    protected $privateReserved8;

    /**
     * @var string
     *
     * @bit       124
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 9"
     * @format    LLLVAR
     */
    protected $privateReserved9;

    /**
     * @var string
     *
     * @bit       125
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 10"
     * @format    LLLVAR
     */
    protected $privateReserved10;

    /**
     * @var string
     *
     * @bit       126
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 11"
     * @format    LLLVAR
     */
    protected $privateReserved11;

    /**
     * @var string
     *
     * @bit       127
     * @display   ans
     * @minLength 1
     * @maxLength 999
     * @description "Private reserved 12"
     * @format    LLLVAR
     */
    protected $privateReserved12;

    /**
     * @var string
     *
     * @bit     128
     * @display b
     * @length  64
     * @description "Message authentication Code (MAC) 2"
     */
    protected $messageAuthenticationCode2;

    /**
     * @return string
     */
    public function getPan(): string
    {
        return $this->pan;
    }

    /**
     * @param string $pan
     *
     * @return ISO8583
     */
    public function setPan(string $pan): ISO8583
    {
        $this->pan = $pan;
        return $this;
    }

    /**
     * @return int
     */
    public function getProcessingCode(): int
    {
        return $this->processingCode;
    }

    /**
     * @param int $processingCode
     *
     * @return ISO8583
     */
    public function setProcessingCode(int $processingCode): ISO8583
    {
        $this->processingCode = $processingCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmountTransaction(): int
    {
        return $this->amountTransaction;
    }

    /**
     * @param int $amountTransaction
     *
     * @return ISO8583
     */
    public function setAmountTransaction(int $amountTransaction): ISO8583
    {
        $this->amountTransaction = $amountTransaction;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmountSettlement(): int
    {
        return $this->amountSettlement;
    }

    /**
     * @param int $amountSettlement
     *
     * @return ISO8583
     */
    public function setAmountSettlement(int $amountSettlement): ISO8583
    {
        $this->amountSettlement = $amountSettlement;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmountCardholderBilling(): int
    {
        return $this->amountCardholderBilling;
    }

    /**
     * @param int $amountCardholderBilling
     *
     * @return ISO8583
     */
    public function setAmountCardholderBilling(int $amountCardholderBilling): ISO8583
    {
        $this->amountCardholderBilling = $amountCardholderBilling;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransmissionDateTime(): string
    {
        return $this->transmissionDateTime;
    }

    /**
     * @param string $transmissionDateTime
     *
     * @return ISO8583
     */
    public function setTransmissionDateTime(string $transmissionDateTime): ISO8583
    {
        $this->transmissionDateTime = $transmissionDateTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getCardholderBillingFee(): int
    {
        return $this->cardholderBillingFee;
    }

    /**
     * @param int $cardholderBillingFee
     *
     * @return ISO8583
     */
    public function setCardholderBillingFee(int $cardholderBillingFee): ISO8583
    {
        $this->cardholderBillingFee = $cardholderBillingFee;
        return $this;
    }

    /**
     * @return int
     */
    public function getConversionRate(): int
    {
        return $this->conversionRate;
    }

    /**
     * @param int $conversionRate
     *
     * @return ISO8583
     */
    public function setConversionRate(int $conversionRate): ISO8583
    {
        $this->conversionRate = $conversionRate;
        return $this;
    }

    /**
     * @return int
     */
    public function getConversionRateCardholderBilling(): int
    {
        return $this->conversionRateCardholderBilling;
    }

    /**
     * @param int $conversionRateCardholderBilling
     *
     * @return ISO8583
     */
    public function setConversionRateCardholderBilling(int $conversionRateCardholderBilling): ISO8583
    {
        $this->conversionRateCardholderBilling = $conversionRateCardholderBilling;
        return $this;
    }

    /**
     * @return int
     */
    public function getSystemsTraceAuditNumber(): int
    {
        return $this->systemsTraceAuditNumber;
    }

    /**
     * @param int $systemsTraceAuditNumber
     *
     * @return ISO8583
     */
    public function setSystemsTraceAuditNumber(int $systemsTraceAuditNumber): ISO8583
    {
        $this->systemsTraceAuditNumber = $systemsTraceAuditNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalTransactionTime(): string
    {
        return $this->localTransactionTime;
    }

    /**
     * @param string $localTransactionTime
     *
     * @return ISO8583
     */
    public function setLocalTransactionTime(string $localTransactionTime): ISO8583
    {
        $this->localTransactionTime = $localTransactionTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocalTransactionDate(): string
    {
        return $this->localTransactionDate;
    }

    /**
     * @param string $localTransactionDate
     *
     * @return ISO8583
     */
    public function setLocalTransactionDate(string $localTransactionDate): ISO8583
    {
        $this->localTransactionDate = $localTransactionDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationDate(): string
    {
        return $this->expirationDate;
    }

    /**
     * @param string $expirationDate
     *
     * @return ISO8583
     */
    public function setExpirationDate(string $expirationDate): ISO8583
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getSettlementDate(): string
    {
        return $this->settlementDate;
    }

    /**
     * @param string $settlementDate
     *
     * @return ISO8583
     */
    public function setSettlementDate(string $settlementDate): ISO8583
    {
        $this->settlementDate = $settlementDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getConversionDate(): string
    {
        return $this->conversionDate;
    }

    /**
     * @param string $conversionDate
     *
     * @return ISO8583
     */
    public function setConversionDate(string $conversionDate): ISO8583
    {
        $this->conversionDate = $conversionDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaptureDate(): string
    {
        return $this->captureDate;
    }

    /**
     * @param string $captureDate
     *
     * @return ISO8583
     */
    public function setCaptureDate(string $captureDate): ISO8583
    {
        $this->captureDate = $captureDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getMerchantType(): int
    {
        return $this->merchantType;
    }

    /**
     * @param int $merchantType
     *
     * @return ISO8583
     */
    public function setMerchantType(int $merchantType): ISO8583
    {
        $this->merchantType = $merchantType;
        return $this;
    }

    /**
     * @return int
     */
    public function getCountryCodeAcquiring(): int
    {
        return $this->countryCodeAcquiring;
    }

    /**
     * @param int $countryCodeAcquiring
     *
     * @return ISO8583
     */
    public function setCountryCodeAcquiring(int $countryCodeAcquiring): ISO8583
    {
        $this->countryCodeAcquiring = $countryCodeAcquiring;
        return $this;
    }

    /**
     * @return int
     */
    public function getPanCountryCode(): int
    {
        return $this->panCountryCode;
    }

    /**
     * @param int $panCountryCode
     *
     * @return ISO8583
     */
    public function setPanCountryCode(int $panCountryCode): ISO8583
    {
        $this->panCountryCode = $panCountryCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getForwardingCountryCode(): int
    {
        return $this->forwardingCountryCode;
    }

    /**
     * @param int $forwardingCountryCode
     *
     * @return ISO8583
     */
    public function setForwardingCountryCode(int $forwardingCountryCode): ISO8583
    {
        $this->forwardingCountryCode = $forwardingCountryCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointOfServiceEntryMode(): int
    {
        return $this->pointOfServiceEntryMode;
    }

    /**
     * @param int $pointOfServiceEntryMode
     *
     * @return ISO8583
     */
    public function setPointOfServiceEntryMode(int $pointOfServiceEntryMode): ISO8583
    {
        $this->pointOfServiceEntryMode = $pointOfServiceEntryMode;
        return $this;
    }

    /**
     * @return int
     */
    public function getCardSequenceNumber(): int
    {
        return $this->cardSequenceNumber;
    }

    /**
     * @param int $cardSequenceNumber
     *
     * @return ISO8583
     */
    public function setCardSequenceNumber(int $cardSequenceNumber): ISO8583
    {
        $this->cardSequenceNumber = $cardSequenceNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getFunctionCode(): int
    {
        return $this->functionCode;
    }

    /**
     * @param int $functionCode
     *
     * @return ISO8583
     */
    public function setFunctionCode(int $functionCode): ISO8583
    {
        $this->functionCode = $functionCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointOfServiceCodeCondition(): int
    {
        return $this->pointOfServiceCodeCondition;
    }

    /**
     * @param int $pointOfServiceCodeCondition
     *
     * @return ISO8583
     */
    public function setPointOfServiceCodeCondition(int $pointOfServiceCodeCondition): ISO8583
    {
        $this->pointOfServiceCodeCondition = $pointOfServiceCodeCondition;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointOfServiceCaptureCode(): int
    {
        return $this->pointOfServiceCaptureCode;
    }

    /**
     * @param int $pointOfServiceCaptureCode
     *
     * @return ISO8583
     */
    public function setPointOfServiceCaptureCode(int $pointOfServiceCaptureCode): ISO8583
    {
        $this->pointOfServiceCaptureCode = $pointOfServiceCaptureCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorisationIdentificationResponseLength(): int
    {
        return $this->authorisationIdentificationResponseLength;
    }

    /**
     * @param int $authorisationIdentificationResponseLength
     *
     * @return ISO8583
     */
    public function setAuthorisationIdentificationResponseLength(int $authorisationIdentificationResponseLength
    ): ISO8583 {
        $this->authorisationIdentificationResponseLength = $authorisationIdentificationResponseLength;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountTransactionFee(): string
    {
        return $this->amountTransactionFee;
    }

    /**
     * @param string $amountTransactionFee
     *
     * @return ISO8583
     */
    public function setAmountTransactionFee(string $amountTransactionFee): ISO8583
    {
        $this->amountTransactionFee = $amountTransactionFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountTransactionSettlementFee(): string
    {
        return $this->amountTransactionSettlementFee;
    }

    /**
     * @param string $amountTransactionSettlementFee
     *
     * @return ISO8583
     */
    public function setAmountTransactionSettlementFee(string $amountTransactionSettlementFee): ISO8583
    {
        $this->amountTransactionSettlementFee = $amountTransactionSettlementFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountTransactionProcessingFee(): string
    {
        return $this->amountTransactionProcessingFee;
    }

    /**
     * @param string $amountTransactionProcessingFee
     *
     * @return ISO8583
     */
    public function setAmountTransactionProcessingFee(string $amountTransactionProcessingFee): ISO8583
    {
        $this->amountTransactionProcessingFee = $amountTransactionProcessingFee;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmountSettlementProcessingFee(): string
    {
        return $this->amountSettlementProcessingFee;
    }

    /**
     * @param string $amountSettlementProcessingFee
     *
     * @return ISO8583
     */
    public function setAmountSettlementProcessingFee(string $amountSettlementProcessingFee): ISO8583
    {
        $this->amountSettlementProcessingFee = $amountSettlementProcessingFee;
        return $this;
    }

    /**
     * @return int
     */
    public function getAcquiringInstitutionIdentificationCode(): int
    {
        return $this->acquiringInstitutionIdentificationCode;
    }

    /**
     * @param int $acquiringInstitutionIdentificationCode
     *
     * @return ISO8583
     */
    public function setAcquiringInstitutionIdentificationCode(int $acquiringInstitutionIdentificationCode): ISO8583
    {
        $this->acquiringInstitutionIdentificationCode = $acquiringInstitutionIdentificationCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getForwardingInstitutionIdentificationCode(): int
    {
        return $this->forwardingInstitutionIdentificationCode;
    }

    /**
     * @param int $forwardingInstitutionIdentificationCode
     *
     * @return ISO8583
     */
    public function setForwardingInstitutionIdentificationCode(int $forwardingInstitutionIdentificationCode): ISO8583
    {
        $this->forwardingInstitutionIdentificationCode = $forwardingInstitutionIdentificationCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getPrimaryAccountNumberExtended(): int
    {
        return $this->primaryAccountNumberExtended;
    }

    /**
     * @param int $primaryAccountNumberExtended
     *
     * @return ISO8583
     */
    public function setPrimaryAccountNumberExtended(int $primaryAccountNumberExtended): ISO8583
    {
        $this->primaryAccountNumberExtended = $primaryAccountNumberExtended;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrack2Data(): string
    {
        return $this->track2Data;
    }

    /**
     * @param string $track2Data
     *
     * @return ISO8583
     */
    public function setTrack2Data(string $track2Data): ISO8583
    {
        $this->track2Data = $track2Data;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrack3Data(): string
    {
        return $this->track3Data;
    }

    /**
     * @param string $track3Data
     *
     * @return ISO8583
     */
    public function setTrack3Data(string $track3Data): ISO8583
    {
        $this->track3Data = $track3Data;
        return $this;
    }

    /**
     * @return string
     */
    public function getRetrievalReferenceNumber(): string
    {
        return $this->retrievalReferenceNumber;
    }

    /**
     * @param string $retrievalReferenceNumber
     *
     * @return ISO8583
     */
    public function setRetrievalReferenceNumber(string $retrievalReferenceNumber): ISO8583
    {
        $this->retrievalReferenceNumber = $retrievalReferenceNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationIdentificationResponse(): string
    {
        return $this->authorizationIdentificationResponse;
    }

    /**
     * @param string $authorizationIdentificationResponse
     *
     * @return ISO8583
     */
    public function setAuthorizationIdentificationResponse(string $authorizationIdentificationResponse): ISO8583
    {
        $this->authorizationIdentificationResponse = $authorizationIdentificationResponse;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
    }

    /**
     * @param string $responseCode
     *
     * @return ISO8583
     */
    public function setResponseCode(string $responseCode): ISO8583
    {
        $this->responseCode = $responseCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceRestrictionCode(): string
    {
        return $this->serviceRestrictionCode;
    }

    /**
     * @param string $serviceRestrictionCode
     *
     * @return ISO8583
     */
    public function setServiceRestrictionCode(string $serviceRestrictionCode): ISO8583
    {
        $this->serviceRestrictionCode = $serviceRestrictionCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardAcceptorTerminalIdentification(): string
    {
        return $this->cardAcceptorTerminalIdentification;
    }

    /**
     * @param string $cardAcceptorTerminalIdentification
     *
     * @return ISO8583
     */
    public function setCardAcceptorTerminalIdentification(string $cardAcceptorTerminalIdentification): ISO8583
    {
        $this->cardAcceptorTerminalIdentification = $cardAcceptorTerminalIdentification;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardAcceptorIdentificationCode(): string
    {
        return $this->cardAcceptorIdentificationCode;
    }

    /**
     * @param string $cardAcceptorIdentificationCode
     *
     * @return ISO8583
     */
    public function setCardAcceptorIdentificationCode(string $cardAcceptorIdentificationCode): ISO8583
    {
        $this->cardAcceptorIdentificationCode = $cardAcceptorIdentificationCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getCardAcceptorNameLocation(): string
    {
        return $this->cardAcceptorNameLocation;
    }

    /**
     * @param string $cardAcceptorNameLocation
     *
     * @return ISO8583
     */
    public function setCardAcceptorNameLocation(string $cardAcceptorNameLocation): ISO8583
    {
        $this->cardAcceptorNameLocation = $cardAcceptorNameLocation;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalResponseData(): string
    {
        return $this->additionalResponseData;
    }

    /**
     * @param string $additionalResponseData
     *
     * @return ISO8583
     */
    public function setAdditionalResponseData(string $additionalResponseData): ISO8583
    {
        $this->additionalResponseData = $additionalResponseData;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrack1Data(): string
    {
        return $this->track1Data;
    }

    /**
     * @param string $track1Data
     *
     * @return ISO8583
     */
    public function setTrack1Data(string $track1Data): ISO8583
    {
        $this->track1Data = $track1Data;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalDataIso(): string
    {
        return $this->additionalDataIso;
    }

    /**
     * @param string $additionalDataIso
     *
     * @return ISO8583
     */
    public function setAdditionalDataIso(string $additionalDataIso): ISO8583
    {
        $this->additionalDataIso = $additionalDataIso;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalDataNational(): string
    {
        return $this->additionalDataNational;
    }

    /**
     * @param string $additionalDataNational
     *
     * @return ISO8583
     */
    public function setAdditionalDataNational(string $additionalDataNational): ISO8583
    {
        $this->additionalDataNational = $additionalDataNational;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalDataPrivate(): string
    {
        return $this->additionalDataPrivate;
    }

    /**
     * @param string $additionalDataPrivate
     *
     * @return ISO8583
     */
    public function setAdditionalDataPrivate(string $additionalDataPrivate): ISO8583
    {
        $this->additionalDataPrivate = $additionalDataPrivate;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCodeTransaction(): string
    {
        return $this->currencyCodeTransaction;
    }

    /**
     * @param string $currencyCodeTransaction
     *
     * @return ISO8583
     */
    public function setCurrencyCodeTransaction(string $currencyCodeTransaction): ISO8583
    {
        $this->currencyCodeTransaction = $currencyCodeTransaction;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCodeSettlement(): string
    {
        return $this->currencyCodeSettlement;
    }

    /**
     * @param string $currencyCodeSettlement
     *
     * @return ISO8583
     */
    public function setCurrencyCodeSettlement(string $currencyCodeSettlement): ISO8583
    {
        $this->currencyCodeSettlement = $currencyCodeSettlement;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCodeCardholderBilling(): string
    {
        return $this->currencyCodeCardholderBilling;
    }

    /**
     * @param string $currencyCodeCardholderBilling
     *
     * @return ISO8583
     */
    public function setCurrencyCodeCardholderBilling(string $currencyCodeCardholderBilling): ISO8583
    {
        $this->currencyCodeCardholderBilling = $currencyCodeCardholderBilling;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonalIdentificationNumberData(): string
    {
        return $this->personalIdentificationNumberData;
    }

    /**
     * @param string $personalIdentificationNumberData
     *
     * @return ISO8583
     */
    public function setPersonalIdentificationNumberData(string $personalIdentificationNumberData): ISO8583
    {
        $this->personalIdentificationNumberData = $personalIdentificationNumberData;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecurityRelatedControlInformation(): string
    {
        return $this->securityRelatedControlInformation;
    }

    /**
     * @param string $securityRelatedControlInformation
     *
     * @return ISO8583
     */
    public function setSecurityRelatedControlInformation(string $securityRelatedControlInformation): ISO8583
    {
        $this->securityRelatedControlInformation = $securityRelatedControlInformation;
        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalAmounts(): string
    {
        return $this->additionalAmounts;
    }

    /**
     * @param string $additionalAmounts
     *
     * @return ISO8583
     */
    public function setAdditionalAmounts(string $additionalAmounts): ISO8583
    {
        $this->additionalAmounts = $additionalAmounts;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved1(): string
    {
        return $this->isoReserved1;
    }

    /**
     * @param string $isoReserved1
     *
     * @return ISO8583
     */
    public function setIsoReserved1(string $isoReserved1): ISO8583
    {
        $this->isoReserved1 = $isoReserved1;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved2(): string
    {
        return $this->isoReserved2;
    }

    /**
     * @param string $isoReserved2
     *
     * @return ISO8583
     */
    public function setIsoReserved2(string $isoReserved2): ISO8583
    {
        $this->isoReserved2 = $isoReserved2;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved1(): string
    {
        return $this->nationalReserved1;
    }

    /**
     * @param string $nationalReserved1
     *
     * @return ISO8583
     */
    public function setNationalReserved1(string $nationalReserved1): ISO8583
    {
        $this->nationalReserved1 = $nationalReserved1;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved2(): string
    {
        return $this->nationalReserved2;
    }

    /**
     * @param string $nationalReserved2
     *
     * @return ISO8583
     */
    public function setNationalReserved2(string $nationalReserved2): ISO8583
    {
        $this->nationalReserved2 = $nationalReserved2;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved3(): string
    {
        return $this->nationalReserved3;
    }

    /**
     * @param string $nationalReserved3
     *
     * @return ISO8583
     */
    public function setNationalReserved3(string $nationalReserved3): ISO8583
    {
        $this->nationalReserved3 = $nationalReserved3;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved1(): string
    {
        return $this->privateReserved1;
    }

    /**
     * @param string $privateReserved1
     *
     * @return ISO8583
     */
    public function setPrivateReserved1(string $privateReserved1): ISO8583
    {
        $this->privateReserved1 = $privateReserved1;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved2(): string
    {
        return $this->privateReserved2;
    }

    /**
     * @param string $privateReserved2
     *
     * @return ISO8583
     */
    public function setPrivateReserved2(string $privateReserved2): ISO8583
    {
        $this->privateReserved2 = $privateReserved2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved3(): string
    {
        return $this->privateReserved3;
    }

    /**
     * @param string $privateReserved3
     *
     * @return ISO8583
     */
    public function setPrivateReserved3(string $privateReserved3): ISO8583
    {
        $this->privateReserved3 = $privateReserved3;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved4(): string
    {
        return $this->privateReserved4;
    }

    /**
     * @param string $privateReserved4
     *
     * @return ISO8583
     */
    public function setPrivateReserved4(string $privateReserved4): ISO8583
    {
        $this->privateReserved4 = $privateReserved4;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageAuthenticationCode(): string
    {
        return $this->messageAuthenticationCode;
    }

    /**
     * @param string $messageAuthenticationCode
     *
     * @return ISO8583
     */
    public function setMessageAuthenticationCode(string $messageAuthenticationCode): ISO8583
    {
        $this->messageAuthenticationCode = $messageAuthenticationCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getSettlementCode(): int
    {
        return $this->settlementCode;
    }

    /**
     * @param int $settlementCode
     *
     * @return ISO8583
     */
    public function setSettlementCode(int $settlementCode): ISO8583
    {
        $this->settlementCode = $settlementCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getExtendedPaymentCode(): int
    {
        return $this->extendedPaymentCode;
    }

    /**
     * @param int $extendedPaymentCode
     *
     * @return ISO8583
     */
    public function setExtendedPaymentCode(int $extendedPaymentCode): ISO8583
    {
        $this->extendedPaymentCode = $extendedPaymentCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceivingInstitutionCountryCode(): int
    {
        return $this->receivingInstitutionCountryCode;
    }

    /**
     * @param int $receivingInstitutionCountryCode
     *
     * @return ISO8583
     */
    public function setReceivingInstitutionCountryCode(int $receivingInstitutionCountryCode): ISO8583
    {
        $this->receivingInstitutionCountryCode = $receivingInstitutionCountryCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getSettlementInstitutionCountryCode(): int
    {
        return $this->settlementInstitutionCountryCode;
    }

    /**
     * @param int $settlementInstitutionCountryCode
     *
     * @return ISO8583
     */
    public function setSettlementInstitutionCountryCode(int $settlementInstitutionCountryCode): ISO8583
    {
        $this->settlementInstitutionCountryCode = $settlementInstitutionCountryCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getNetworkManagementInformationCode(): int
    {
        return $this->networkManagementInformationCode;
    }

    /**
     * @param int $networkManagementInformationCode
     *
     * @return ISO8583
     */
    public function setNetworkManagementInformationCode(int $networkManagementInformationCode): ISO8583
    {
        $this->networkManagementInformationCode = $networkManagementInformationCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageNumber(): int
    {
        return $this->messageNumber;
    }

    /**
     * @param int $messageNumber
     *
     * @return ISO8583
     */
    public function setMessageNumber(int $messageNumber): ISO8583
    {
        $this->messageNumber = $messageNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageNumberLast(): int
    {
        return $this->messageNumberLast;
    }

    /**
     * @param int $messageNumberLast
     *
     * @return ISO8583
     */
    public function setMessageNumberLast(int $messageNumberLast): ISO8583
    {
        $this->messageNumberLast = $messageNumberLast;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateAction(): string
    {
        return $this->dateAction;
    }

    /**
     * @param string $dateAction
     *
     * @return ISO8583
     */
    public function setDateAction(string $dateAction): ISO8583
    {
        $this->dateAction = $dateAction;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsNumber(): int
    {
        return $this->creditsNumber;
    }

    /**
     * @param int $creditsNumber
     *
     * @return ISO8583
     */
    public function setCreditsNumber(int $creditsNumber): ISO8583
    {
        $this->creditsNumber = $creditsNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsReversalNumber(): int
    {
        return $this->creditsReversalNumber;
    }

    /**
     * @param int $creditsReversalNumber
     *
     * @return ISO8583
     */
    public function setCreditsReversalNumber(int $creditsReversalNumber): ISO8583
    {
        $this->creditsReversalNumber = $creditsReversalNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getDebitsNumber(): int
    {
        return $this->debitsNumber;
    }

    /**
     * @param int $debitsNumber
     *
     * @return ISO8583
     */
    public function setDebitsNumber(int $debitsNumber): ISO8583
    {
        $this->debitsNumber = $debitsNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getDebitsReversalNumber(): int
    {
        return $this->debitsReversalNumber;
    }

    /**
     * @param int $debitsReversalNumber
     *
     * @return ISO8583
     */
    public function setDebitsReversalNumber(int $debitsReversalNumber): ISO8583
    {
        $this->debitsReversalNumber = $debitsReversalNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getTransferNumber(): int
    {
        return $this->transferNumber;
    }

    /**
     * @param int $transferNumber
     *
     * @return ISO8583
     */
    public function setTransferNumber(int $transferNumber): ISO8583
    {
        $this->transferNumber = $transferNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getTransferReversalNumber(): int
    {
        return $this->transferReversalNumber;
    }

    /**
     * @param int $transferReversalNumber
     *
     * @return ISO8583
     */
    public function setTransferReversalNumber(int $transferReversalNumber): ISO8583
    {
        $this->transferReversalNumber = $transferReversalNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getInquiriesNumber(): int
    {
        return $this->inquiriesNumber;
    }

    /**
     * @param int $inquiriesNumber
     *
     * @return ISO8583
     */
    public function setInquiriesNumber(int $inquiriesNumber): ISO8583
    {
        $this->inquiriesNumber = $inquiriesNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorisationsNumber(): int
    {
        return $this->authorisationsNumber;
    }

    /**
     * @param int $authorisationsNumber
     *
     * @return ISO8583
     */
    public function setAuthorisationsNumber(int $authorisationsNumber): ISO8583
    {
        $this->authorisationsNumber = $authorisationsNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsProcessingFeeAmount(): int
    {
        return $this->creditsProcessingFeeAmount;
    }

    /**
     * @param int $creditsProcessingFeeAmount
     *
     * @return ISO8583
     */
    public function setCreditsProcessingFeeAmount(int $creditsProcessingFeeAmount): ISO8583
    {
        $this->creditsProcessingFeeAmount = $creditsProcessingFeeAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsTransactionFeeAmount(): int
    {
        return $this->creditsTransactionFeeAmount;
    }

    /**
     * @param int $creditsTransactionFeeAmount
     *
     * @return ISO8583
     */
    public function setCreditsTransactionFeeAmount(int $creditsTransactionFeeAmount): ISO8583
    {
        $this->creditsTransactionFeeAmount = $creditsTransactionFeeAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDebitsProcessingFeeAmount(): int
    {
        return $this->debitsProcessingFeeAmount;
    }

    /**
     * @param int $debitsProcessingFeeAmount
     *
     * @return ISO8583
     */
    public function setDebitsProcessingFeeAmount(int $debitsProcessingFeeAmount): ISO8583
    {
        $this->debitsProcessingFeeAmount = $debitsProcessingFeeAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDebitsTransactionFeeAmount(): int
    {
        return $this->debitsTransactionFeeAmount;
    }

    /**
     * @param int $debitsTransactionFeeAmount
     *
     * @return ISO8583
     */
    public function setDebitsTransactionFeeAmount(int $debitsTransactionFeeAmount): ISO8583
    {
        $this->debitsTransactionFeeAmount = $debitsTransactionFeeAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsAmount(): int
    {
        return $this->creditsAmount;
    }

    /**
     * @param int $creditsAmount
     *
     * @return ISO8583
     */
    public function setCreditsAmount(int $creditsAmount): ISO8583
    {
        $this->creditsAmount = $creditsAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreditsReversalAmount(): int
    {
        return $this->creditsReversalAmount;
    }

    /**
     * @param int $creditsReversalAmount
     *
     * @return ISO8583
     */
    public function setCreditsReversalAmount(int $creditsReversalAmount): ISO8583
    {
        $this->creditsReversalAmount = $creditsReversalAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDebitsAmount(): int
    {
        return $this->debitsAmount;
    }

    /**
     * @param int $debitsAmount
     *
     * @return ISO8583
     */
    public function setDebitsAmount(int $debitsAmount): ISO8583
    {
        $this->debitsAmount = $debitsAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getDebitsReversalAmount(): int
    {
        return $this->debitsReversalAmount;
    }

    /**
     * @param int $debitsReversalAmount
     *
     * @return ISO8583
     */
    public function setDebitsReversalAmount(int $debitsReversalAmount): ISO8583
    {
        $this->debitsReversalAmount = $debitsReversalAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalDataElements(): string
    {
        return $this->originalDataElements;
    }

    /**
     * @param string $originalDataElements
     *
     * @return ISO8583
     */
    public function setOriginalDataElements(string $originalDataElements): ISO8583
    {
        $this->originalDataElements = $originalDataElements;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileUpdateCode(): string
    {
        return $this->fileUpdateCode;
    }

    /**
     * @param string $fileUpdateCode
     *
     * @return ISO8583
     */
    public function setFileUpdateCode(string $fileUpdateCode): ISO8583
    {
        $this->fileUpdateCode = $fileUpdateCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getFileSecurityCode(): int
    {
        return $this->fileSecurityCode;
    }

    /**
     * @param int $fileSecurityCode
     *
     * @return ISO8583
     */
    public function setFileSecurityCode(int $fileSecurityCode): ISO8583
    {
        $this->fileSecurityCode = $fileSecurityCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getResponseIndicator(): int
    {
        return $this->responseIndicator;
    }

    /**
     * @param int $responseIndicator
     *
     * @return ISO8583
     */
    public function setResponseIndicator(int $responseIndicator): ISO8583
    {
        $this->responseIndicator = $responseIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceIndicator(): string
    {
        return $this->serviceIndicator;
    }

    /**
     * @param string $serviceIndicator
     *
     * @return ISO8583
     */
    public function setServiceIndicator(string $serviceIndicator): ISO8583
    {
        $this->serviceIndicator = $serviceIndicator;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplacementAmounts(): string
    {
        return $this->replacementAmounts;
    }

    /**
     * @param string $replacementAmounts
     *
     * @return ISO8583
     */
    public function setReplacementAmounts(string $replacementAmounts): ISO8583
    {
        $this->replacementAmounts = $replacementAmounts;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageSecurityCode(): string
    {
        return $this->messageSecurityCode;
    }

    /**
     * @param string $messageSecurityCode
     *
     * @return ISO8583
     */
    public function setMessageSecurityCode(string $messageSecurityCode): ISO8583
    {
        $this->messageSecurityCode = $messageSecurityCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmountNetSettlement(): int
    {
        return $this->amountNetSettlement;
    }

    /**
     * @param int $amountNetSettlement
     *
     * @return ISO8583
     */
    public function setAmountNetSettlement(int $amountNetSettlement): ISO8583
    {
        $this->amountNetSettlement = $amountNetSettlement;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayee(): string
    {
        return $this->payee;
    }

    /**
     * @param string $payee
     *
     * @return ISO8583
     */
    public function setPayee(string $payee): ISO8583
    {
        $this->payee = $payee;
        return $this;
    }

    /**
     * @return int
     */
    public function getSettlementInstitutionIdentificationCode(): int
    {
        return $this->settlementInstitutionIdentificationCode;
    }

    /**
     * @param int $settlementInstitutionIdentificationCode
     *
     * @return ISO8583
     */
    public function setSettlementInstitutionIdentificationCode(int $settlementInstitutionIdentificationCode): ISO8583
    {
        $this->settlementInstitutionIdentificationCode = $settlementInstitutionIdentificationCode;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceivingInstitutionIdentificationCode(): int
    {
        return $this->receivingInstitutionIdentificationCode;
    }

    /**
     * @param int $receivingInstitutionIdentificationCode
     *
     * @return ISO8583
     */
    public function setReceivingInstitutionIdentificationCode(int $receivingInstitutionIdentificationCode): ISO8583
    {
        $this->receivingInstitutionIdentificationCode = $receivingInstitutionIdentificationCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     *
     * @return ISO8583
     */
    public function setFileName(string $fileName): ISO8583
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountIdentification1(): string
    {
        return $this->accountIdentification1;
    }

    /**
     * @param string $accountIdentification1
     *
     * @return ISO8583
     */
    public function setAccountIdentification1(string $accountIdentification1): ISO8583
    {
        $this->accountIdentification1 = $accountIdentification1;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountIdentification2(): string
    {
        return $this->accountIdentification2;
    }

    /**
     * @param string $accountIdentification2
     *
     * @return ISO8583
     */
    public function setAccountIdentification2(string $accountIdentification2): ISO8583
    {
        $this->accountIdentification2 = $accountIdentification2;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionDescription(): string
    {
        return $this->transactionDescription;
    }

    /**
     * @param string $transactionDescription
     *
     * @return ISO8583
     */
    public function setTransactionDescription(string $transactionDescription): ISO8583
    {
        $this->transactionDescription = $transactionDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved3(): string
    {
        return $this->isoReserved3;
    }

    /**
     * @param string $isoReserved3
     *
     * @return ISO8583
     */
    public function setIsoReserved3(string $isoReserved3): ISO8583
    {
        $this->isoReserved3 = $isoReserved3;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved4(): string
    {
        return $this->isoReserved4;
    }

    /**
     * @param string $isoReserved4
     *
     * @return ISO8583
     */
    public function setIsoReserved4(string $isoReserved4): ISO8583
    {
        $this->isoReserved4 = $isoReserved4;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved5(): string
    {
        return $this->isoReserved5;
    }

    /**
     * @param string $isoReserved5
     *
     * @return ISO8583
     */
    public function setIsoReserved5(string $isoReserved5): ISO8583
    {
        $this->isoReserved5 = $isoReserved5;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved6(): string
    {
        return $this->isoReserved6;
    }

    /**
     * @param string $isoReserved6
     *
     * @return ISO8583
     */
    public function setIsoReserved6(string $isoReserved6): ISO8583
    {
        $this->isoReserved6 = $isoReserved6;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved7(): string
    {
        return $this->isoReserved7;
    }

    /**
     * @param string $isoReserved7
     *
     * @return ISO8583
     */
    public function setIsoReserved7(string $isoReserved7): ISO8583
    {
        $this->isoReserved7 = $isoReserved7;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved8(): string
    {
        return $this->isoReserved8;
    }

    /**
     * @param string $isoReserved8
     *
     * @return ISO8583
     */
    public function setIsoReserved8(string $isoReserved8): ISO8583
    {
        $this->isoReserved8 = $isoReserved8;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsoReserved9(): string
    {
        return $this->isoReserved9;
    }

    /**
     * @param string $isoReserved9
     *
     * @return ISO8583
     */
    public function setIsoReserved9(string $isoReserved9): ISO8583
    {
        $this->isoReserved9 = $isoReserved9;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved4(): string
    {
        return $this->nationalReserved4;
    }

    /**
     * @param string $nationalReserved4
     *
     * @return ISO8583
     */
    public function setNationalReserved4(string $nationalReserved4): ISO8583
    {
        $this->nationalReserved4 = $nationalReserved4;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved5(): string
    {
        return $this->nationalReserved5;
    }

    /**
     * @param string $nationalReserved5
     *
     * @return ISO8583
     */
    public function setNationalReserved5(string $nationalReserved5): ISO8583
    {
        $this->nationalReserved5 = $nationalReserved5;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved6(): string
    {
        return $this->nationalReserved6;
    }

    /**
     * @param string $nationalReserved6
     *
     * @return ISO8583
     */
    public function setNationalReserved6(string $nationalReserved6): ISO8583
    {
        $this->nationalReserved6 = $nationalReserved6;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved7(): string
    {
        return $this->nationalReserved7;
    }

    /**
     * @param string $nationalReserved7
     *
     * @return ISO8583
     */
    public function setNationalReserved7(string $nationalReserved7): ISO8583
    {
        $this->nationalReserved7 = $nationalReserved7;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved8(): string
    {
        return $this->nationalReserved8;
    }

    /**
     * @param string $nationalReserved8
     *
     * @return ISO8583
     */
    public function setNationalReserved8(string $nationalReserved8): ISO8583
    {
        $this->nationalReserved8 = $nationalReserved8;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved9(): string
    {
        return $this->nationalReserved9;
    }

    /**
     * @param string $nationalReserved9
     *
     * @return ISO8583
     */
    public function setNationalReserved9(string $nationalReserved9): ISO8583
    {
        $this->nationalReserved9 = $nationalReserved9;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved10(): string
    {
        return $this->nationalReserved10;
    }

    /**
     * @param string $nationalReserved10
     *
     * @return ISO8583
     */
    public function setNationalReserved10(string $nationalReserved10): ISO8583
    {
        $this->nationalReserved10 = $nationalReserved10;
        return $this;
    }

    /**
     * @return string
     */
    public function getNationalReserved11(): string
    {
        return $this->nationalReserved11;
    }

    /**
     * @param string $nationalReserved11
     *
     * @return ISO8583
     */
    public function setNationalReserved11(string $nationalReserved11): ISO8583
    {
        $this->nationalReserved11 = $nationalReserved11;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved5(): string
    {
        return $this->privateReserved5;
    }

    /**
     * @param string $privateReserved5
     *
     * @return ISO8583
     */
    public function setPrivateReserved5(string $privateReserved5): ISO8583
    {
        $this->privateReserved5 = $privateReserved5;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved6(): string
    {
        return $this->privateReserved6;
    }

    /**
     * @param string $privateReserved6
     *
     * @return ISO8583
     */
    public function setPrivateReserved6(string $privateReserved6): ISO8583
    {
        $this->privateReserved6 = $privateReserved6;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved7(): string
    {
        return $this->privateReserved7;
    }

    /**
     * @param string $privateReserved7
     *
     * @return ISO8583
     */
    public function setPrivateReserved7(string $privateReserved7): ISO8583
    {
        $this->privateReserved7 = $privateReserved7;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved8(): string
    {
        return $this->privateReserved8;
    }

    /**
     * @param string $privateReserved8
     *
     * @return ISO8583
     */
    public function setPrivateReserved8(string $privateReserved8): ISO8583
    {
        $this->privateReserved8 = $privateReserved8;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved9(): string
    {
        return $this->privateReserved9;
    }

    /**
     * @param string $privateReserved9
     *
     * @return ISO8583
     */
    public function setPrivateReserved9(string $privateReserved9): ISO8583
    {
        $this->privateReserved9 = $privateReserved9;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved10(): string
    {
        return $this->privateReserved10;
    }

    /**
     * @param string $privateReserved10
     *
     * @return ISO8583
     */
    public function setPrivateReserved10(string $privateReserved10): ISO8583
    {
        $this->privateReserved10 = $privateReserved10;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved11(): string
    {
        return $this->privateReserved11;
    }

    /**
     * @param string $privateReserved11
     *
     * @return ISO8583
     */
    public function setPrivateReserved11(string $privateReserved11): ISO8583
    {
        $this->privateReserved11 = $privateReserved11;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateReserved12(): string
    {
        return $this->privateReserved12;
    }

    /**
     * @param string $privateReserved12
     *
     * @return ISO8583
     */
    public function setPrivateReserved12(string $privateReserved12): ISO8583
    {
        $this->privateReserved12 = $privateReserved12;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageAuthenticationCode2(): string
    {
        return $this->messageAuthenticationCode2;
    }

    /**
     * @param string $messageAuthenticationCode2
     *
     * @return ISO8583
     */
    public function setMessageAuthenticationCode2(string $messageAuthenticationCode2): ISO8583
    {
        $this->messageAuthenticationCode2 = $messageAuthenticationCode2;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return self::SCHEMA_NAME;
    }
}
