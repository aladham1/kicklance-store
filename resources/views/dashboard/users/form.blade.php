
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                               value="{{old('name', $user->name)}}"
                               placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" autocomplete="off" class="form-control" id="email"
                               value="{{old('email', $user->email)}}"
                               placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" class="form-control" id="country"
                               value="{{old('country', $user->profile->country)}}"
                               placeholder="Enter country">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" class="form-control" id="city"
                               value="{{old('city', $user->profile->city)}}"
                               placeholder="Enter city">
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" id="birthdate"
                               value="{{old('birthdate', $user->profile->birthdate)}}"
                               placeholder="Enter birthdate">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                               placeholder="Enter password">
                    </div>
