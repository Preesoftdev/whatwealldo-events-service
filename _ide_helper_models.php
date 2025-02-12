<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivitySchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivitySchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ActivitySchedule query()
 */
	class ActivitySchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomAssetField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\MaintenanceDetail|null $maintenance
 * @property-read \App\Models\MortgageDetail|null $mortgage
 * @property-read \App\Models\OccupancyDetail|null $occupancy
 * @property-read \App\Models\RealEstateDetail|null $realEstate
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Asset query()
 */
	class Asset extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomBankAccount> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BankAccount query()
 */
	class BankAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomBusinessField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\document> $documents
 * @property-read int|null $documents_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Business query()
 */
	class Business extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CalendarSchedule query()
 */
	class CalendarSchedule extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomCareerDevelopmentField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareerDevelopment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareerDevelopment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CareerDevelopment query()
 */
	class CareerDevelopment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClubSociety newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClubSociety newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClubSociety query()
 */
	class ClubSociety extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunicationNetwork newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunicationNetwork newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunicationNetwork query()
 */
	class CommunicationNetwork extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunicationPreference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunicationPreference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CommunicationPreference query()
 */
	class CommunicationPreference extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Asset|null $asset
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomAssetField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomAssetField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomAssetField query()
 */
	class CustomAssetField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\BankAccount|null $bankAccounts
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomBankAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomBankAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomBankAccount query()
 */
	class CustomBankAccount extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Business|null $business
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomBusinessField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomBusinessField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomBusinessField query()
 */
	class CustomBusinessField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\CareerDevelopment|null $careerDevelopment
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomCareerDevelopmentField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomCareerDevelopmentField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomCareerDevelopmentField query()
 */
	class CustomCareerDevelopmentField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\EducationDetail|null $educationDetail
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomEducationField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomEducationField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomEducationField query()
 */
	class CustomEducationField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\HealthRecord|null $healthRecord
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomHealthRecordField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomHealthRecordField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomHealthRecordField query()
 */
	class CustomHealthRecordField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Loan|null $loan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomLoan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomLoan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomLoan query()
 */
	class CustomLoan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\ParentingResource|null $parentingResource
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomParentingResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomParentingResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomParentingResource query()
 */
	class CustomParentingResource extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomReferenceField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomReferenceField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomReferenceField query()
 */
	class CustomReferenceField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\SkillsetDetail|null $skillsetDetail
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomSkillsetField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomSkillsetField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomSkillsetField query()
 */
	class CustomSkillsetField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\SportFitness|null $sportFitness
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomSportsFitnessField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomSportsFitnessField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomSportsFitnessField query()
 */
	class CustomSportsFitnessField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DietNutrition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DietNutrition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DietNutrition query()
 */
	class DietNutrition extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomEducationField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducationDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducationDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|EducationDetail query()
 */
	class EducationDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FitnessTracking newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FitnessTracking newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|FitnessTracking query()
 */
	class FitnessTracking extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\HealthRecord|null $healthRecord
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthDocument query()
 */
	class HealthDocument extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\DietNutrition|null $dietNutrition
 * @property-read \App\Models\FitnessTracking|null $fitnessTracking
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\MedicalHistory|null $medicalHistory
 * @property-read \App\Models\HealthInformationType|null $type
 * @property-read \App\Models\VaccinationRecord|null $vaccinationRecord
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthInformation query()
 */
	class HealthInformation extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HealthInformation> $healthInformations
 * @property-read int|null $health_informations_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthInformationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthInformationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthInformationType query()
 */
	class HealthInformationType extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomHealthRecordField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HealthDocument> $healthDocuments
 * @property-read int|null $health_documents_count
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HealthRecord query()
 */
	class HealthRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InsurancePolicy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InsurancePolicy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InsurancePolicy query()
 */
	class InsurancePolicy extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\customInvestmentField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment query()
 */
	class Investment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomLoan> $customLoans
 * @property-read int|null $custom_loans_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Loan query()
 */
	class Loan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\Locker|null $locker
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LockCustomField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LockCustomField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LockCustomField query()
 */
	class LockCustomField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LockCustomField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Locker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Locker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Locker query()
 */
	class Locker extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Asset|null $asset
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MaintenanceDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MaintenanceDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MaintenanceDetail query()
 */
	class MaintenanceDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MedicalHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MedicalHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MedicalHistory query()
 */
	class MedicalHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Asset|null $asset
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MortgageDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MortgageDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MortgageDetail query()
 */
	class MortgageDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Asset|null $asset
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OccupancyDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OccupancyDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|OccupancyDetail query()
 */
	class OccupancyDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomParentingResource> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ParentingResource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ParentingResource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ParentingResource query()
 */
	class ParentingResource extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalNetWorth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalNetWorth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PersonalNetWorth query()
 */
	class PersonalNetWorth extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\Asset|null $asset
 * @property-read \App\Models\TFactory|null $use_factory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|RealEstateDetail query()
 */
	class RealEstateDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomReferenceField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Reference query()
 */
	class Reference extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferenceTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferenceTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReferenceTag query()
 */
	class ReferenceTag extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomSkillsetField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkillsetDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkillsetDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SkillsetDetail query()
 */
	class SkillsetDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialMediaIntegration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialMediaIntegration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialMediaIntegration query()
 */
	class SocialMediaIntegration extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialRecreationalActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialRecreationalActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SocialRecreationalActivity query()
 */
	class SocialRecreationalActivity extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CustomSportsFitnessField> $customFields
 * @property-read int|null $custom_fields_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SportFitness newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SportFitness newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SportFitness query()
 */
	class SportFitness extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxAdditionalDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxAdditionalDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxAdditionalDetail query()
 */
	class TaxAdditionalDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxAssetInvestment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxAssetInvestment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxAssetInvestment query()
 */
	class TaxAssetInvestment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxCompliance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxCompliance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxCompliance query()
 */
	class TaxCompliance extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxCredit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxCredit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxCredit query()
 */
	class TaxCredit extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxDeduction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxDeduction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxDeduction query()
 */
	class TaxDeduction extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxFiling newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxFiling newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxFiling query()
 */
	class TaxFiling extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxIncome newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxIncome newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxIncome query()
 */
	class TaxIncome extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPayment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPayment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPayment query()
 */
	class TaxPayment extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPaymentProcessing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPaymentProcessing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPaymentProcessing query()
 */
	class TaxPaymentProcessing extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxAdditionalDetail|null $taxAdditionalDetails
 * @property-read \App\Models\TaxAssetInvestment|null $taxAssetsInvestments
 * @property-read \App\Models\TaxCompliance|null $taxCompliance
 * @property-read \App\Models\TaxCredit|null $taxCredits
 * @property-read \App\Models\TaxDeduction|null $taxDeductions
 * @property-read \App\Models\TaxFiling|null $taxFiling
 * @property-read \App\Models\TaxIncome|null $taxIncome
 * @property-read \App\Models\TaxPaymentProcessing|null $taxPaymentProcessing
 * @property-read \App\Models\TaxPayment|null $taxPayments
 * @property-read \App\Models\TaxUser|null $taxUser
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxPlan query()
 */
	class TaxPlan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\TaxPlan|null $taxPlan
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TaxUser query()
 */
	class TaxUser extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 */
	class User extends \Eloquent implements \Spatie\MediaLibrary\HasMedia, \Tymon\JWTAuth\Contracts\JWTSubject {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VaccinationRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VaccinationRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|VaccinationRecord query()
 */
	class VaccinationRecord extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\Investment|null $investment
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customInvestmentField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customInvestmentField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|customInvestmentField query()
 */
	class customInvestmentField extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|document query()
 */
	class document extends \Eloquent {}
}

