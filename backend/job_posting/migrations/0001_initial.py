# Generated by Django 5.0.2 on 2024-02-26 19:54

import django.db.models.deletion
from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='JobCategory',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(choices=[('electrician', 'Electrician'), ('plumber', 'Plumber'), ('cleaner', 'Cleaner')], max_length=20)),
            ],
        ),
        migrations.CreateModel(
            name='JobWorker',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('first_name', models.CharField(max_length=200)),
                ('last_name', models.CharField(max_length=200)),
                ('description', models.TextField()),
                ('price', models.FloatField()),
                ('job_category', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='job_posting.jobcategory')),
            ],
        ),
    ]
