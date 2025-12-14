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
            font-family: times, serif;
            font-size: 10pt;
            line-height: 1.5rem;
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
    </style>
</head>

<body>
    <div>
        @php
            // base64 encode image and set as src for image
            $imagePath = public_path('cropped-cohome-logo-270x270.png');
            $imageData = base64_encode(file_get_contents($imagePath));
            $imageSrc = 'data:image/png;base64,' . $imageData;
        @endphp
        <img src="{{ $imageSrc }}" alt="" style="width: 1.5cm; float: left;">

        <div style="font-size: 14pt; font-weight: bold; margin-top: 0.5cm; margin-bottom: 1cm; text-align: center;">
            Tenancy
            Agreement</div>

        <div>The Premises Known As: <span class="field">{{ $room->property->property_name }}, {{ $room->room_number }}</span></div>

        <div>
            This Agreement is made on the ______________________ between
            <span class="field">CoHome SG Pte Ltd</span> hereinafter called (The Landlord) and
            _____________________________ hereinafter called (The Tenant).
        </div>

        <div>
            The
            Landlord agrees to rent out a ___________________________of the premises to the Tenant at the monthly
            rental of Singapore Dollars <span class="field">S$ {{ number_format($room->price_month, 2) }}</span> for a period of
            ____________ months commencing from the ______________________ to the ______________________ with
            the term and conditions as stated below: -

            <ol>
                <li>
                    The Tenant agrees to pay ____________
                    rent as deposit equivalent to Singapore Dollars _______________________________________.
                </li>
                <li>Such deposit shall be refundable at the end of the term less deduction for damage caused by the
                    Tenant, if any.</li>
                <li>The Tenant must pay the monthly rental on or before ___ of each month.</li>
                <li>In case of non-payment (the sum having first been demanded) or breach of this agreement by the
                    Tenant, the Landlord may re-enter and take possession of the said premises. The Landlord may also
                    terminate the Agreement &amp; forfeit the deposit accordingly.</li>
                <li>The rental includes water, electricity, gas, and internet bills. * The monthly utility
                    bill shall be capped at Singapore Dollars <span class="field">S$ {{ number_format($room->utilities, 2) }}</span>.<br />
                    The Tenant shall pay the *full / ___% of the excess amount.</li>
                <li>The above premises are strictly for residential use only and no other use is permitted without
                    the expressed and written consent of the Landlord.</li>
                <li>No alteration or additional work is allowed in the premises without the Landlord&#8217;s written
                    permission.</li>
                <li>The room shall be not occupied more than _________ persons. The Tenant is not allowed to sublet
                    the premises.</li>
                <li>The Tenant shall not smoke in the premises.</li>
                <li>The Tenant shall not keep any pet or bird at the premises without the written permission of the
                    Landlord and to comply with any conditions imposed by the Landlord in the event of such permission
                    being granted.</li>
                <li>Both the Tenant and the Landlord can give __________ month(s) notice for early termination of
                    tenancy
                    after a minimum occupation period of __________ month(s). In this case, the deposit shall be
                    refunded after deductions for damages caused by The Tenant, if any. In the event the Tenant gives
                    such notice, the Tenant shall reimburse to the Landlord, in respect of the unexpired portion of
                    the tenancy, a proportionate part of the commission paid by the Landlord to the Estate Agent.</li>
                <li>If the Tenant fails to proceed with the Rental Agreement by ______________________, the deposit
                    shall
                    be forfeited to the Landlord. If the Landlord fails to proceed with this Room Rental Agreement,
                    the Landlord shall refund the deposit to the Tenant and shall pay the agreed commission to The
                    Estate Agent.</li>
                <li>The Tenant must produce original &amp; photocopy of his/her NRIC / Passport / Student Pass / Work
                    Pass to prove his/her identity and legitimate stay in Singapore.</li>
            </ol>
        </div>

        <div style="position:absolute; bottom:1cm; width: 100%;">
        <p style="width:100%; text-align:center;">Page 1 of 2</p>
        <i>*delete if not applicable </i>
    </div>
    </div>


    <div style="page-break-before: always;">
        <p>In agreement to the above terms and conditions.</p>

        <table style="width:100%;">
            <tr>
                <td style="padding-top:3cm;padding-bottom:3cm;">
                    _____________________________<br />
                    Landlord’s Signature<br />
                    Name:<br />
                    *NRIC / FIN / Passport No.:<br />
                </td>
                <td style="padding-top:3cm;padding-bottom:3cm;">
                    _____________________________<br />
                    Tenant’s Signature<br />
                    Name: <span class="field">{{ $tenant->name }}</span><br />
                    *NRIC / FIN / Passport No.: <span class="field">{{ $tenant->fin }}</span><br />
                </td>
            </tr>
            <tr>
                <td>
                    In the presence of<br /><br /><br />
                    __________________________<br />
                    Name: Name:<br />
                    *NRIC / FIN / Passport No.:<br />
                </td>
                <td>
                    In the presence of<br /><br /><br />
                    __________________________<br />
                    Name: Name:<br />
                    *NRIC / FIN / Passport No.:<br />
                </td>
            </tr>
        </table>
    </div>

    <div style="position:absolute; bottom:1cm; width: 100%;">
        <p style="width:100%; text-align:center;">Page 2 of 2</p>
        <i>*delete if not applicable </i>
    </div>

    
</body>

</html>
