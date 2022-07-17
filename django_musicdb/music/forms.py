#forms.py
from django import forms
from django.forms import ModelForm
from .models import Users

class Userdb(ModelForm):
    class Meta:
        model = Users
        fields = '__all__'