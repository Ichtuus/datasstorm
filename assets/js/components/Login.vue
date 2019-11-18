<template id="signinTemplate">
	  <form ref='form' @submit.prevent='handleForm' action="" class='signin-form'>
			<h2>Signin</h2>
			<div class="form-group">
				 <label for="email">Adresse électronique</label>
				 <input required v-model='user.email' type="email" id='email' placeholder="Adresse électronique">
			</div>
			<div class="form-group">
				 <label for="password">Mot de passe</label>
				 <input required v-model='user.password' type="password" id='password' placeholder="Mot de passe">
			</div>
			<input :disabled='!isFormValid' type="submit" value="Signin">
	  </form>
 </template>


<script>
export default {
}
</script>

<style lang="css" scoped>
</style>
