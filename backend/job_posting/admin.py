from django.contrib import admin
from .models import JobCategory, JobWorker

# Register your models here.
admin.site.register(JobCategory)
admin.site.register(JobWorker)