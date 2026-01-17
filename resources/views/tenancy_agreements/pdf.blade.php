<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenancy Agreement</title>

    <style>
        /* @font-face {
            font-family: 'Inconsolata';
            font-style: normal;
            font-weight: 400;
            src: url('{{ storage_path('fonts/Inconsolata-VariableFont_wdth,wght.ttf') }}') format('truetype');
        } */

        @page {
            margin-left: 2.5cm;
            margin-right: 2cm;
            margin-bottom: 0.5cm;
        }

        body {
            font-family: sans-serif;
            font-size: 8pt;
            line-height: 1.5;
        }

        div {
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }

        ol {
            list-style-position: outside;
            padding-left: 1.5rem;
        }

        .field {
            /* font-family: 'Inconsolata', sans-serif; */
            text-decoration: underline;
            font-weight: bold;
        }

        div.section {
            margin-bottom: 0.5cm;
        }

        span.indent {
            display: inline-block;
            width: 160pt;
        }

        .page-break {
            page-break-before: always;
        }

        td {
            vertical-align: top;
            line-height: 1.3;
        }

        .signature {
            position: absolute;
            bottom: 1cm;
            right: 0;
            text-align: center;
        }
        .signature table {
            border-collapse: collapse;
            font-size: 8pt;
        }
        .signature th {
            border: 1px solid #888;
            background-color: #333;
            color: #FFF;
            width: 3cm;
        }
        .signature td {
            border: 1px solid #888;
            width: 2.5cm;
            height: 0.8cm;
        }
    </style>
</head>

<body>
    <table style="width: 100%; border-none;">
        <tr>
            <td style="width: 2cm; vertical-align:middle;">
                @php
                    // base64 encode image and set as src for image
                    $imagePath = public_path('cohome-logo_pdf.png');
                    $imageData = base64_encode(file_get_contents($imagePath));
                    $imageSrc = 'data:image/png;base64,' . $imageData;
                @endphp
                <img src="{{ $imageSrc }}" alt="" style="width: 2.0cm;">
            </td>
            <td style="width: 80%; text-align:right; line-height:1.2; vertical-align:middle;">
                <strong>COHOME SG PTE LTD</strong><br />
                UEN No. 202342735Z<br />
                55 Ubi Ave 1, #03-10<br />
                Singapore 408935<br />
                hello@cohomesg.com
            </td>
        </tr>
    </table>



    <div style="font-family: times, serif; font-size: 14pt; font-weight: bold; margin-top: 0.1cm; margin-bottom: 0.5cm; text-align: center;">
        Room Tenancy Agreement</div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr>
                <td style="width: 0.5cm;">1.0</td>
                <td style="width: 30%;"><strong>AGREEMENT DATE</strong></td>
                <td style="width: 1rem;">:</td>
                <td>{{ \Carbon\Carbon::parse($tenancy_agreement->data['agreement_date'])->format('d / M / Y') }}
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">2.0</td>
                <td colspan="3"><strong>PROPERTY MANAGER/CO-LIVING OPERATOR (MASTER TENANT)</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">2.1</td>
                <td style="width: 30%;">Company Name/UEN</td>
                <td style="width: 1rem;">:</td>
                <td>Cohome SG Pte Ltd (aka Cohome SG)</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">2.2</td>
                <td style="width: 30%;">Address</td>
                <td style="width: 1rem;">:</td>
                <td>55 Ubi Ave 1, #03-10, Singapore 408935</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">2.3</td>
                <td style="width: 30%;">Email</td>
                <td style="width: 1rem;">:</td>
                <td>hello@cohomesg.com</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">3.0</td>
                <td colspan="3"><strong>ROOM TENANT</strong></td>
            </tr>
            <tr>
                <td>3.1</td>
                <td style="width: 30%;">Name</td>
                <td style="width: 1rem;">:</td>
                <td>{{ $tenancy_agreement->tenant->name }}</td>
            </tr>
            <tr>
                <td>3.2</td>
                <td style="width: 30%;">FIN </td>
                <td style="width: 1rem;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>3.4</td>
                <td style="width: 30%;">Passport Number</td>
                <td style="width: 1rem;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>3.3</td>
                <td style="width: 30%;">Passport Expiry</td>
                <td style="width: 1rem;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>3.3</td>
                <td style="width: 30%;">Work Permit Expiry</td>
                <td style="width: 1rem;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>3.5</td>
                <td style="width: 30%;">Email</td>
                <td style="width: 1rem;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>3.6</td>
                <td style="width: 30%;">Phone</td>
                <td style="width: 1rem;">:</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">4.0</td>
                <td colspan="3"><strong>PREMISES TO BE RENTED</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">4.1</td>
                <td style="width: 30%;">Address</td>
                <td style="width: 1rem;">:</td>
                <td>{{ $tenancy_agreement->room->property->address }}</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">4.2</td>
                <td style="width: 30%;">Rooms to be Rented</td>
                <td style="width: 1rem;">:</td>
                <td>{{ $tenancy_agreement->room->room_number }}
                    {{ ucwords($tenancy_agreement->room->room_detail->details['room']) }} Room
                </td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">4.3</td>
                <td style="width: 30%;">Furniture, Fixtures & Fittings</td>
                <td style="width: 1rem;">:</td>
                <td>Furnished (Per Attached Inventory List)*</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">5.0</td>
                <td colspan="3"><strong>TENANCY PERIOD</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">5.1</td>
                <td style="width: 30%;">Term of Tenancy</td>
                <td style="width: 1rem;">:</td>
                <td>{{ $tenancy_agreement->term_of_tenancy }}</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">5.2</td>
                <td style="width: 30%;">Start Date</td>
                <td style="width: 1rem;">:</td>
                <td>{{ \Carbon\Carbon::parse($tenancy_agreement->start_date)->format('d / M / Y') }}</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">5.3</td>
                <td style="width: 30%;">End Date</td>
                <td style="width: 1rem;">:</td>
                <td>{{ \Carbon\Carbon::parse($tenancy_agreement->end_date)->format('d / M / Y') }}
                    (or a later date depending on the time the notice is given)
                </td>
            </tr>
        </table>
    </div>


    <div class="section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">6.0</td>
                <td colspan="3"><strong>PAYMENT</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.1</td>
                <td style="width: 30%;">Monthly Rent</td>
                <td style="width: 1rem;">:</td>
                <td>S$ {{ $tenancy_agreement->data['price_month'] }}
                    <br />
                    (Payable by 7th day of every month starting from 8 Jan 2026)
                </td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.2</td>
                <td style="width: 30%;">Rental Deposit</td>
                <td style="width: 1rem;">:</td>
                <td>S$ {{ $tenancy_agreement->data['deposit'] }} {{ ($tenancy_agreement->data['deposit_received_date'] ?? null) ? '(Received on '. \Carbon\Carbon::parse($tenancy_agreement->data['deposit_received_date'])->format('d / M / Y') . ')' : '(To be collected)' }}
                    <br />
                    (Unless mutually agreed, early lease termination or cancellation will result in forfeiture of
                    deposit. Deposit will be refunded (without interest), at the end of this tenancy, subject to any
                    deductions by Cohome SG for damages, cleaning and additional utility charges if incurred)
                </td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.3</td>
                <td style="width: 30%;">Not to be utilized as set off</td>
                <td style="width: 1rem;">:</td>
                <td>This deposit <strong>shall not be</strong> utilized as set-off for any rent due and payable
                    during the currency of this agreement
                </td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.4</td>
                <td style="width: 30%;">Admin fee</td>
                <td style="width: 1rem;">:</td>
                <td>S${{ $tenancy_agreement->data['admin_fee'] }} (will be waived if lease term is at least 12 month)</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.5</td>
                <td style="width: 30%;">Clear out fee</td>
                <td style="width: 1rem;">:</td>
                <td>S${{ $tenancy_agreement->data['clear_out_fee'] }} (It will be deducted from deposit upon end of lease)</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.6</td>
                <td style="width: 30%;">Aircon cleaning fee</td>
                <td style="width: 1rem;">:</td>
                <td>S${{ $tenancy_agreement->data['aircon_cleaning_fee'] }} per quarter (every 3 months) will be collected by Cohome SG</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">6.7</td>
                <td style="width: 30%;">Payment mode</td>
                <td style="width: 1rem;">:</td>
                <td>
                    Bank transfer to bank account: <strong>{{ $tenancy_agreement->data['payment_mode_id'] }}</strong><br />
                    (add remark: HVG0704rm7) (Acct name: Cohome SG Pte Ltd)<br />
                    or Paynow via <strong>UEN 202342735Z</strong>
                </td>
            </tr>
        </table>
    </div>

    <div class="signature">
        <table>
            <tr>
                <th>Operator</th>
                <th>Tenant</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <em>(Please initial)</em>
    </div>

    <div class="page-break section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">7.0</td>
                <td><strong>PROPERTY MANAGER’S RESPONSIBILITIES</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">7.1</td>
                <td>Charges for electricity and water bill (capped at $50/room)</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">7.2</td>
                <td>Charges for weekly cleaning service of common areas</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">7.3</td>
                <td>Charges for installation & usage of wifi</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">7.4</td>
                <td>Minor repairs (due to wear and tear)</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">7.5</td>
                <td>Servicing air-conditioning units</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">7.6</td>
                <td>Repair of air-conditioning units</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">8.0</td>
                <td><strong>TENANT’S RESPONSIBILITIES</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.1</td>
                <td>To pay the rent punctually every month. Late interest of 10% of rent amount to be imposed
                    for every 1 day of late rent and forfeiture of deposit for more than 7 days late in rent payment
                    plus eviction.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.2</td>
                <td>To keep the interior, aircon, walls, curtains and furniture of the room in clean, good &
                    tenantable condition.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.2a</td>
                <td> To keep the common areas, kitchen, common toilets, furniture of the apartment in clean and
                    good condition.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.2b</td>
                <td> Tenant will be liable for damage and missing items in the room and common areas.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.3</td>
                <td>To permit the Cohome SG or landlord representatives to bring interested parties to view the
                    said premises for the purpose of letting or selling the property.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.4</td>
                <td>To use the said premises for private residence only.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.5</td>
                <td>Not to become a nuisance or annoyance to adjoining occupiers.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.6</td>
                <td>Not to use the said premises for any unlawful or immoral purposes.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.7</td>
                <td>Not to assign or sublet the said premises without the consent of the Landlord and Cohome SG.
                </td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.8</td>
                <td>In the event of lease termination notice from Cohome due to Master Tenancy lease
                    termination, Cohome will offer a replacement room at the agreed rent price. Tenant will have the
                    option to reject without forfeiting the deposit.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.9</td>
                <td>To pay Tenancy stamp duty within 7 days after the agreement is signed.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.10</td>
                <td>To follow the house rules set by Cohome SG.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.11</td>
                <td>No pet allowed unless approved by Cohome SG.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.12</td>
                <td>No reassignment of this tenancy to 3rd party.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.13</td>
                <td>Tenants or Occupiers are not allowed to invite anyone for an overnight stay in the
                    apartment.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.14</td>
                <td>Tenant must ensure that he always has the valid visa or Work Permit during the lease. If
                    their visa or work permit are revoked before the lease expiry, he must inform Cohome SG within
                    24hr. </td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.15</td>
                <td>Tenant cannot change or use other room without the permission from Cohome SG.</td>
            </tr>
            <tr>
                <td style="width: 0.5cm;">8.16</td>
                <td>Fines will be imposed on tenant if he/she did not follow rules imposed. Cohome SG has the
                    right to add any additional rules by informing tenant.</td>
            </tr>
        </table>
    </div>

    <div class="signature">
        <table>
            <tr>
                <th>Operator</th>
                <th>Tenant</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
        <em>(Please initial)</em>
    </div>

    <div class="page-break section">
        <table style="width: 100%; border-none;">
            <tr style="background-color: #d5e8ed;">
                <td style="width: 0.5cm;">9.0</td>
                <td><strong>HOUSE RULES (Not limiting and Cohome SG has the right to add any
                        additional rules by informing)</strong></td>
            </tr>
            <tr>
                <td style="width: 0.5cm;"></td>
                <td>
                    <ol>
                        <li>To clean and wash up kitchen after using it in the same day.</li>
                        <li>No overnight dishes or greasy stove allowed to be left uncleaned.</li>
                        <li>To remove laundry from the washing machine and dryer once done.</li>
                        <li>Only light cooking is allowed. (Gas not provided by Cohome SG)</li>
                        <li>Fridge to be shared with other tenants.</li>
                        <li>Do not remove or use items that do not belong to you.</li>
                        <li>Do not leave dangerous or explosive items on the premise. No PMD charging</li>
                        <li>Switch off electrical power when not using.</li>
                        <li>If any item is found damaged or missing and nobody claims responsibility, the cost of
                            repair/replacement will be shared by all tenants.</li>
                        <li>Any damage/ leaking must be reported to Cohome SG.</li>
                        <li>Charges of electricity will be shared among all the occupiers if exceeded the cap.</li>
                        <li>Tenants must keep the common area in clean condition. Food waste must be cleared daily.
                        </li>
                        <li>The floor and the wall paint of the apartment must not be damaged (tenant will be
                            charged the cost of repair)</li>
                        <li>Strictly no smoking. $200 fine. Cohome will impose fine on tenant for not following
                            house rules.</li>
                    </ol>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr>
                <td style="width: 0.5cm;">9.1</td>
                <td>
                    Failing to meet the above terms and conditions will result in monetary penalty imposed by Cohome
                    SG. The penalty must be paid within 7 days upon request or be deducted from deposit. The penalty
                    amount is $50 or 2 times the amount of repair/cleaning/replacement cost if any incurred,
                    whichever higher.
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <table style="width: 100%; border-none;">
            <tr>
                <td style="width: 0.5cm;">9.2</td>
                <td>
                    Cohome SG reserves the right to terminate the lease by giving the tenant 1 week notice in
                    advance should there be a breach in terms and conditions agreed in this tenancy agreement. No notice
                    period will be given if termination of lease due failing to pay rent in 2 weeks or conducting
                    illegal activities or disrespecting/harassing other tenants. No refund of deposit.
                </td>
            </tr>
        </table>
    </div>


    <div style="position: absolute; bottom:2cm;">
        <table style="width: 100%; border-none;">
            <tr>
                <td style="width: 30%;">SIGNED by Cohome SG director</td>
                <td style="width: 0.5cm;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Company Name</td>
                <td>:</td>
                <td>Cohome SG Pte Ltd</td>
            </tr>
            <tr>
                <td>UEN No.</td>
                <td>:</td>
                <td>202342735Z</td>
            </tr>

            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>

            <tr>
                <td style="width: 30%;">SIGNED by the Tenant</td>
                <td style="width: 0.5cm;">:</td>
                <td></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>Passport Number</td>
                <td>:</td>
                <td></td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>:</td>
                <td></td>
            </tr>
        </table>
    </div>
</body>

</html>
