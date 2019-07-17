<?php

function contactFormyour(){
	ob_start();
	?>
		<div class="Myform">
			<form id="contact-form-us" method="post" action="<?php plugins_url() .'/includes/contact-action.php' ?>">
				<div class="form-group">
					<div class="form-g-w">
						<label for="name">
							enter your name
						</label>
						<input type="text" name="name" id="name" placeholder="your name" required>
					</div>
					<div class="form-g-w">
						<label for="email">
							enter your email
						</label>
						<input type="email" name="email" id="email" placeholder="your email" required>
					</div>
					<div class="clearfix"></div>					
				</div>
				<div class="form-group">
					<div class="form-g-w">
						<label for="phone">
							enter your phone number
						</label>
						<input type="text" name="phone" id="phone" placeholder="your phone" >
					</div>
					<div class="form-g-w">
						<label for="subject">
							enter your subject
						</label>
						<input type="text" name="subject" id="subject" placeholder="your subject" required>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group">
					<input type="hidden" name="recipient" id="recipient" value="<?php echo esc_attr( get_option('to-email') ); ?>">
				</div>				
				<div class="form-group">
					<label for="message">
						your message
					</label>
					<textarea id="message" name="message" rows="6" placeholder="message content"></textarea>
				</div>
				<input type="submit" name="submit" value="submit">
			</form>
		</div>

		<div class="Messge-form"></div>

	<?php
	return ob_get_clean();
}

add_shortcode('contactMessageuse','contactFormyour');