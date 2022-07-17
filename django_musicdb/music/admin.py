from django.contrib import admin

# Register your models here.
from .models import Users, Ratings, Artists, Info

admin.site.register(Users)
admin.site.register(Ratings)
admin.site.register(Artists)
admin.site.register(Info)

