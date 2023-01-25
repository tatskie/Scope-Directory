<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0//EN" "http://www.w3.org/TR/REC-html40/strict.dtd">

<html><head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TLE Billing</title>

    <style type="text/css" media="all">
        body { font-size: 15px; }
        .tle { color:#00a0e3; } /*#3575D3*/ 
        .tlein { color:#3575D3; } 
        .background { box-shadow: inset 0 0 1000rem 1000rem; } /* Forces background colors to appear in print mode */ 
        .tle.background { background-color:#3575D3; } 
        .tlein.background { background-color:#3575D3; } 
        .invoice { 
        	border-radius: .25rem; 
        	box-shadow: 0 0 .4rem .1rem #8c858c; 
        	color: #5B5B5B; 
        	font-family: 'Open Sans',Arial,sans-serif; 
        	font-size: .75rem; 
        	margin: auto; 
        	max-width: 750px; 
        	min-height: 52rem; 
        	min-width: 300px; 
        	overflow: hidden; 
        	padding-bottom: 1rem;
        	} 
        .logo { margin: 1rem; } 
        section { margin: 0 2rem 1rem; } 
        h1 { font-size: 1.75rem; font-weight: normal; margin: 1rem 0; text-align: center; } 
        h2 { 
        	color: #5B5B5B; 
        	font-size: .9rem; 
        	line-height: 1rem; 
        	margin: 1rem 0; 
        	text-transform: capitalize; 
        	display: flex;
        	}
        p { margin-top: 0; } 
        hr { background-color: #A9A9A9; border: 0; color: #A9A9A9; height: 1px; margin: 1rem; } 
        .footer { align-self: end; justify-self: center; margin-top: 0.5rem; text-align: center; } 
        .transact-desc { text-align: center; margin: 0 !important; } 
        .text-center { text-align: center; } 
        .text-right { float: right; text-align: right; white-space: nowrap; } 
        .box { border: 1px solid #A9A9A9; border-radius: .25rem; padding: 0 1rem .5rem; } 
        .text-left { text-align: left; } 
        .general table { 
        	background-color: #A9A9A9; 
        	border-collapse: separate; 
        	border-radius: .25rem; 
        	border-spacing: 1px; 
        	min-height: 12rem; 
        	table-layout: fixed; 
        	} 
        .general table td { background-color: #ffffff; padding: 0 1rem 0.5rem; vertical-align: top; } 
        .general table td:first-child { border-radius: .25rem 0 0 .25rem; } 
        .general table td:last-child { border-radius: 0 .25rem .25rem 0; } 
        .domain { word-break: break-word; } 
        .totals { margin-top: 2rem; text-align: right; } 
        .total { color: #5B5B5B; font-size: 0.95rem; font-weight: bold; } 
        .invoice table, .general table, .box table, .desktop table { width: 100%; color: #5B5B5B; } 
        thead { 
        	color: #5B5B5B; 
        	font-size: .9rem; 
        	line-height: 2.5rem; 
        	margin: 0; text-align: 
        	left; text-transform: capitalize; 
        	white-space: nowrap; 
        	} 
        .statement-reminder { 
        	font-size: .9rem; 
        	font-style: italic; 
        	font-weight: bold; } 
        .mobile { display: none; }
    </style>
</head>

<body>
<div class="invoice">
    <header class="tle background">
        <img class="logo" src="{{ url('assets/images/t1-logo.png') }}" alt="tle_logo">
    </header>
    <h1 class="tle">Thank you for your order!</h1>
<section>

</section>

<section class="general desktop">
    <table>
        <tbody>
            <tr><td>
                <h2>Billing Information</h2>
                <p>{{ auth()->user()->name }}</p>
                <p></p>
                <p>Talamban</p>
                <p>CEBU,  6000</p>
            </td>
            <td>
                <h2>Receipt Details</h2>
                <p>Invoice Number: <span class="text-right">{{ $receipt->number }}</span></p>
                <p>Date: <span class="text-right">{{ $receipt->created_at->format('F j, Y') }}</span></p>
            </td>
        </tr></tbody>
    </table>
</section>

<section class="box">
    <table class="items desktop">
        <thead>
            <tr>
                <th>Category</th>
                <th>AIF</th>
                <th>Term</th>
                <th>Expiration</th>
                <th class="text-right">Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $receipt->academiaCategory->specialist_title }}</td>
                <td class="domain">{{ $receipt->aif->title }}</td>
                <td>2 years</td>
                <td>{{ $receipt->expire_at->format('F j, Y') }}</td>
                <td class="text-right">${{ $receipt->academiaCategory->fee }}</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td class="domain">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="text-right">$25</td>
            </tr>
        </tbody>
    </table>

    <hr class="background">

    <div class="totals">
        <p>Subtotal: ${{ $receipt->academiaCategory->fee + 25}}</p>
        <p class="total">Total: ${{ $receipt->academiaCategory->fee + 25}}</p>
    </div>
</section>

<section class="transact-desc">
    <p class="statement-reminder">
        This will be billed as “tesol-licence.education” on your credit card statement.
    </p>
</section>

<section class="footer">
        <p>TESOL Licence Education </p>
        <p>Address 1</p>
        <p>Address 2</p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p>Address 3 </p>
        <p>Singapore</p>
</section>

</div>

</body></html>