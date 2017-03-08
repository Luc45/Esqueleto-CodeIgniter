<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Editar Perfil</h4>
                            </div>
                            <div class="content">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo lang('edit_user_fname_label', 'first_name');?>
                                                <?php echo form_input($first_name);?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php echo lang('edit_user_lname_label', 'last_name');?>
                                                <?php echo form_input($last_name);?>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <?php echo form_input($email);?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo lang('edit_user_company_label', 'company');?>
                                                <?php echo form_input($company);?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo lang('edit_user_phone_label', 'phone');?>
                                                <?php echo form_input($phone);?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo lang('edit_user_password_label', 'password');?>
                                                <?php echo form_input($password);?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
                                                <?php echo form_input($password_confirm);?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <?php if ($this->ion_auth->is_admin()): ?>

                                                  <h4><?php echo lang('edit_user_groups_heading');?></h4>
                                                  <?php foreach ($groups as $group):?>
                                                        <p>
                                                          <label class="checkbox">
                                                          <?php
                                                              $gID=$group['id'];
                                                              $checked = null;
                                                              $item = null;
                                                              foreach($currentGroups as $grp) {
                                                                  if ($gID == $grp->id) {
                                                                      $checked= ' checked=""';
                                                                  break;
                                                                  }
                                                              }
                                                          ?>
                                                          <input type="checkbox" name="groups[]" data-toggle="checkbox" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                                          <?php echo htmlspecialchars(ucfirst($group['name']),ENT_QUOTES,'UTF-8');?>
                                                          </label>
                                                        </p>
                                                  <?php endforeach?>

                                              <?php endif ?>
                                            </div>
                                        </div>
                                    </div>

                                    <?php echo form_hidden('id', $user->id);?>
                                    <?php echo form_hidden($csrf); ?>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Atualizar Perfil</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>