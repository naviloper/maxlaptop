<div class="art-block">
                              <div class="art-block-tl"></div>
                              <div class="art-block-tr"></div>
                              <div class="art-block-bl"></div>
                              <div class="art-block-br"></div>
                              <div class="art-block-tc"></div>
                              <div class="art-block-bc"></div>
                              <div class="art-block-cl"></div>
                              <div class="art-block-cr"></div>
                              <div class="art-block-cc"></div>
                              <div class="art-block-body">
                                          <div class="art-blockheader">
                                              <h3 class="t">User Info</h3>
                                          </div>
                                          <div class="art-blockcontent">
                                              <div class="art-blockcontent-body">
                                                  Welcome <b><?php echo $sf_user->getUsername() ?></b>
                                                  <br>
                                                  <a href="<?php echo url_for('@sf_guard_signout') ?>" class="art-button">Logout</a>
                                          		<div class="cleared"></div>
                                              </div>
                                          </div>
                          		<div class="cleared"></div>
                              </div>
                          </div>