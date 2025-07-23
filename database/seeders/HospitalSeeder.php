<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dhaka_hospitals = [
            // 🏥 Government Hospitals
            "Bangabandhu Sheikh Mujib Medical University (BSMMU)",
            "Dhaka Medical College & Hospital",
            "Shaheed Suhrawardy Medical College & Hospital",
            "National Institute of Neurosciences & Hospital",
            "National Institute of Cardiovascular Diseases",
            "National Institute of Cancer Research & Hospital",
            "National Institute of Kidney Diseases & Urology",
            "National Institute of Mental Health",
            "National Institute of Traumatology and Orthopaedic Rehabilitation (NITOR/Pongu Hospital)",
            "Mugda Medical College & Hospital",
            "Kurmitola General Hospital",
            "Dhaka Shishu (Children) Hospital",
            "Sir Salimullah Medical College & Mitford Hospital",

            // 🏥 Private Hospitals
            "United Hospital Limited",
            "Evercare Hospital Dhaka",
            "Labaid Specialized Hospital",
            "Square Hospitals Ltd.",
            "Ibn Sina Hospital Dhanmondi",
            "Popular Diagnostic Center & Hospital (Dhanmondi)",
            "Bangladesh Specialized Hospital",
            "BIRDEM General Hospital",
            "Anwer Khan Modern Medical College Hospital",
            "Holy Family Red Crescent Medical College Hospital",
            "Asgar Ali Hospital",
            "Central Hospital Ltd.",
            "Green Life Hospital",
            "BRB Hospital Ltd.",
            "Delta Hospital Ltd.",
            "Islami Bank Central Hospital",
            "Japan Bangladesh Friendship Hospital",
            "Medinova Medical Services Ltd.",
            "City Hospital Ltd.",
            "Mirpur Adhunik Hospital",
            "Tairunnessa Memorial Medical Center (Uttara)",
            "Meril Hospital (Uttara)",
            "Aichi Hospital",
            "Ibrahim Cardiac Hospital & Research Institute"
        ];


        foreach($dhaka_hospitals as $hospital){
            Hospital::factory()->create([
                'name' => $hospital,
            ]);
        }

    }
}
