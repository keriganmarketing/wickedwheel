<div class="contact-form">
    <form method="post" >
        <input id="sec-form-code" type="text" name="sec" value="" class="sec-form-code" style="position: absolute; left:-10000px; top:-10000px; height:0px; width:0px;" tabindex="-1" >
        <input type="hidden" name="user_agent" value="{{user-agent}}" >
        <input type="hidden" name="ip_address" value="{{ip-address}}" >
        <input type="hidden" name="referrer" value="{{referrer}}" >
        <div class="columns is-multiline">
            <div class="column is-6">
                <label class="sr-only" for="first-name-text">First Name</label>
                <input id="first-name-text" type="text" name="first_name" class="input" placeholder="First Name" required>
            </div>
            <div class="column is-6">
                <label class="sr-only" for="last-name-text">Last Name</label>
                <input id="last-name-text" type="text" name="last_name" class="input" placeholder="Last Name" required>
            </div>
            <div class="column is-12">
                <label class="sr-only" for="email-address-text">Email Address</label>
                <input id="email-address-text" type="email" name="email_address" class="input email" placeholder="Email Address" required>
            </div>
            <div class="column is-12">
                <label class="sr-only" for="message-text">Message</label>
                <textarea id="message-text" class="textarea" name="message" placeholder="Type your message here."></textarea>
            </div>
            <div class="column is-12">
                <button class="button is-primary is-rounded has-shadow" type="submit">submit</button>
            </div>
        </div>
    </form>
</div>