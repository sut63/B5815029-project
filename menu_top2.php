<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<ul class="Head-Menu" style="margin-left: 50px; font-size: 13px;">
<li class="Page1" id="limenuHead"><a href="admin_member.php?m_page=3"> ข้อมูลสมาชิก </a></li>
					<li class="Page5" id="limenuHead"><a href="admin_main.php?m_page=1">ข้อมูลใบสั่งซื้อ</a></li>
					<li class="Page2" id="limenuHead"><a href="admin_report1.php?m_page=2"> รายการขายสินค้าสินค้า </a></li>
					<li class="Page3" id="limenuHead"><a href="admin_product.php?m_page=3"> ข้อมูลสินค้า</a></li>		
					<li class="Page4" id="limenuHead"><a href="admin_bank.php?m_page=3"> ข้อมูลธนาคาร</a></li>		
					<li class="Page6" id="limenuHead"><a href="admin_format_ems.php?m_page=3"> รูปแบบจัดส่ง</a></li>
					<li class="Page7" id="limenuHead"><a href="admin_board.php?m_page=3"> เว็บบอร์ด </a></li>
                    <?PHP
					  if(!$_SESSION['sess_emp_userid']==""){
					    echo " <li class=\"Page\" id=\"limenuHead\">
						<a href=\"logout.php\" title=\"ออกจากระบบ\" class=\"vtip\">ออกระบบ</a></li>";
					  }
					?>
</ul>
<p style="clear:both;"></p>
