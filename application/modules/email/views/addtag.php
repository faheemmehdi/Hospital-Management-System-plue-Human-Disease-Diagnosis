 <form role="form" name="myform" action="sms/addTag" method="post" enctype="multipart/form-data">                                                                                    

                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" value='' placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> <?php echo lang('templatename'); ?></label>
                                                <select name="type">
                                                    <option value="sms">sms</option>
                                                    <option value="email">email</option>
                                                </select>
                                            </div>
                                            
                                           <button type="submit" name="submit" class="btn btn-info"><?php echo lang('submit'); ?></button>
                                        </form>
            </div>
            </form>

