from django.contrib.auth.forms import UserChangeForm, UserCreationForm
from accounts.models import CustomUser
from django import forms

class CustomUserCreationForm(UserCreationForm):
    first_name = forms.CharField(max_length=200)
    last_name = forms.CharField(max_length=200)

    class Meta:
        model = CustomUser
        fields = ['first_name', 'last_name','username', 'email', 'password1', 'password2']

class CustomUserChangeForm(UserChangeForm):
    class Meta:
        model = CustomUser
        fields = ['username', 'email']