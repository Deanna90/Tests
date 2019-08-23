<?php
namespace Page;

class BusinessSubCategoriesList
{
    const FoodAndDrink_Bakeries                         = 'Bakeries';
    const FoodAndDrink_BanquetFacilities                = 'Banquet Facilities';
    const FoodAndDrink_BarsAndPubs                      = 'Bars & Pubs';
    const FoodAndDrink_CaterersAndPersonalChefs         = 'Caterers & Personal Chefs';
    const FoodAndDrink_CoffeeAndTea                     = 'Coffee & Tea';
    const FoodAndDrink_CookingSuppliesAndClasses        = 'Cooking Supplies & Classes';
    const FoodAndDrink_FarmersMarketsOperators          = 'Farmers Markets Operators';
    const FoodAndDrink_GroceryStores	                = 'Grocery Stores';
    const FoodAndDrink_ManufacturersAndDistributors     = 'Manufacturers & Distributors';
    const FoodAndDrink_MealPreparationAndDelivery       = 'Meal Preparation & Delivery';
    const FoodAndDrink_OtherFoodAndDrink                = 'Other Food & Drink';
    const FoodAndDrink_RestaurantsAndCafes              = 'Restaurants & Cafes';
    const FoodAndDrink_SpecialtyFoods                   = 'Specialty Foods';
    const FoodAndDrink_WineBeerAndLiquorStores          = 'Wine, Beer & Liquor Stores';
    const FoodAndDrink_WineriesBreweriesAndDistilleries = 'Wineries, Breweries & Distilleries';
    /////////////////////////////////////////////////////////////////////////////
    
    const ShoppingAndRetail_AdultRetail                             = 'Adult Retail';
    const ShoppingAndRetail_AppliancesAndHomeElectronics            = 'Appliances & Home Electronics';
    const ShoppingAndRetail_ArtGalleriesAndDealers                  = 'Art Galleries & Dealers	';
    const ShoppingAndRetail_ArtsCraftsAndHobbies                    = 'Arts, Crafts & Hobbies	';
    const ShoppingAndRetail_AudioAndVideoEquipment                  = 'Audio & Video Equipment	';
    const ShoppingAndRetail_AutoParts                               = 'Auto Parts	';
    const ShoppingAndRetail_BabyAndMaternitySupplies                = 'Baby & Maternity Supplies';
    const ShoppingAndRetail_BicyclesAndScooters                     = 'Bicycles & Scooters';
    const ShoppingAndRetail_BooksMoviesAndMusic                     = 'Books, Movies & Music	';
    const ShoppingAndRetail_ClothingAndFootwear                     = 'Clothing & Footwear	';
    const ShoppingAndRetail_CookingSuppliesAndClasses               = 'Cooking Supplies & Classes	';
    const ShoppingAndRetail_DepartmentStores                        = 'Department Stores	';
    const ShoppingAndRetail_FairTradeProducts                       = 'Fair Trade Products	';
    const ShoppingAndRetail_Florists                                = 'Florists';
    const ShoppingAndRetail_FurnitureFurnishings                    = 'Furniture/Furnishings	';
    const ShoppingAndRetail_GardenPatioSuppliesAndNurseries         = 'Garden/Patio Supplies & Nurseries	';
    const ShoppingAndRetail_GiftsNoveltiesAndSouvenirs              = 'Gifts, Novelties & Souvenirs	';
    const ShoppingAndRetail_GroceryStores                           = 'Grocery Stores	';
    const ShoppingAndRetail_HardwareStores                          = 'Hardware Stores	';
    const ShoppingAndRetail_Jewelry                                 = 'Jewelry';
    const ShoppingAndRetail_LuggageAndLeatherGoods                  = 'Luggage & Leather Goods';
    const ShoppingAndRetail_MusicalInstruments                      = 'Musical Instruments';
    const ShoppingAndRetail_OfficeSuppliesEquipmentAndStationery    = 'Office Supplies, Equipment & Stationery';
    const ShoppingAndRetail_OtherRetailers                          = 'Other Retailers';
    const ShoppingAndRetail_PharmaciesHealthAndPersonalCareProducts = 'Pharmacies, Health & Personal Care Products';
    const ShoppingAndRetail_SewingAndFabrics                        = 'Sewing & Fabrics';
    const ShoppingAndRetail_ShoppingCenters                         = 'Shopping Centers';
    const ShoppingAndRetail_SportsAndRecreationEquipment            = 'Sports & Recreation Equipment';
    const ShoppingAndRetail_ThriftAntiqueAndUsedMerchandise         = 'Thrift, Antique & Used Merchandise';
    const ShoppingAndRetail_ToysGamesAndEducationalProducts         = 'Toys, Games & Educational Products';
    const ShoppingAndRetail_WineBeerAndLiquorStores                 = 'Wine, Beer & Liquor Stores';
    ////////////////////////////////////
   
    const LodgingAndTravel_CampsAndRvParks           = 'Camps & Rv Parks';
    const LodgingAndTravel_Lodging                   = 'Lodging';
    const LodgingAndTravel_OtherTravelAndTourism     = 'Other Travel & Tourism';
    const LodgingAndTravel_ScenicAndSightseeingTours = 'Scenic & Sightseeing Tours';
    const LodgingAndTravel_TravelAgencies            = 'Travel Agencies';
    const LodgingAndTravel_VisitorInformation        = 'Visitor Information';
    ////////////////////////////
    
    const ArtsEntertainmentAndRecreation_AgentsManagersAndPromoters          = 'Agents, Managers & Promoters';
    const ArtsEntertainmentAndRecreation_AmusementParksAndArcades            = 'Amusement Parks & Arcades';
    const ArtsEntertainmentAndRecreation_ArtGalleriesAndDealers              = 'Art Galleries & Dealers';
    const ArtsEntertainmentAndRecreation_ArtistsWritersAndPerformers         = 'Artists, Writers & Performers';
    const ArtsEntertainmentAndRecreation_CoachesAndSportsInstructors         = 'Coaches & Sports Instructors';
    const ArtsEntertainmentAndRecreation_FairgroundsSportsAndEventCenters    = 'Fairgrounds, Sports & Event Centers';
    const ArtsEntertainmentAndRecreation_HistoricalSites                     = 'Historical Sites';
    const ArtsEntertainmentAndRecreation_MovieTheaters                       = 'Movie Theaters';
    const ArtsEntertainmentAndRecreation_MuseumsAndAttractions               = 'Museums & Attractions';
    const ArtsEntertainmentAndRecreation_MusicalInstruments                  = 'Musical Instruments';
    const ArtsEntertainmentAndRecreation_OtherArtsEntertainmentAndRecreation = 'Other Arts, Entertainment & Recreation';
    const ArtsEntertainmentAndRecreation_ParksRecreationAndNatureCenters     = 'Parks, Recreation & Nature Centers';
    const ArtsEntertainmentAndRecreation_PerformingArts                      = 'Performing Arts';
    const ArtsEntertainmentAndRecreation_WinterSportsFacilities              = 'Winter Sports Facilities';
    ////////////////////////////
    
    const HealthAndWellness_AcupuncturistsChiropractorsAndNaturopaths = 'Acupuncturists, Chiropractors & Naturopaths';
    const HealthAndWellness_AssistedLivingAndNursingCare              = 'Assisted Living & Nursing Care';
    const HealthAndWellness_Clinics                                   = 'Clinics';
    const HealthAndWellness_ComplementaryAndAlternativePractitioners  = 'Complementary & Alternative Practitioners';
    const HealthAndWellness_DentistsAndOrthodontists                  = 'Dentists & Orthodontists';
    const HealthAndWellness_DiagnosticServices                        = 'Diagnostic Services';
    const HealthAndWellness_FitnessCenters                            = 'Fitness Centers';
    const HealthAndWellness_LifeAndCareerCoaching                     = 'Life & Career Coaching';
    const HealthAndWellness_MassageTherapists                         = 'Massage Therapists';
    const HealthAndWellness_MedicalEquipmentAndSupplies               = 'Medical Equipment & Supplies';
    const HealthAndWellness_MentalHealthServices                      = 'Mental Health Services';
    const HealthAndWellness_NutritionCounseling                       = 'Nutrition Counseling';
    const HealthAndWellness_OtherHealthAndWellness                    = 'Other Health & Wellness';
    const HealthAndWellness_PersonalTrainers                          = 'Personal Trainers';
    const HealthAndWellness_PharmaciesHealthAndPersonalCareProducts   = 'Pharmacies, Health & Personal Care Products';
    const HealthAndWellness_PhysicalAndOccupationalTherapists         = 'Physical & Occupational Therapists';
    const HealthAndWellness_Physicians                                = 'Physicians';
    const HealthAndWellness_PregnancyAndBirthServices                 = 'Pregnancy & Birth Services';
    const HealthAndWellness_SpeechTherapistsAndAudiologists           = 'Speech Therapists & Audiologists';
    const HealthAndWellness_SubstanceAbuseServices                    = 'Substance Abuse Services';
    const HealthAndWellness_VeterinarianCare                          = 'Veterinarian Care';
    const HealthAndWellness_VisionCare                                = 'Vision Care';
    const HealthAndWellness_WellnessHealingCentersAndSpas             = 'Wellness/Healing Centers & Spas';
    const HealthAndWellness_YogaAndMeditation                         = 'Yoga & Meditation';
    //////////////////////////
    
    const AutoRepairSalesAndRental_AlternativeFuelVehicles             = 'Alternative Fuel Vehicles';
    const AutoRepairSalesAndRental_AutoAndTruckRental                  = 'Auto & Truck Rental';
    const AutoRepairSalesAndRental_AutoBodyAndPaint                    = 'Auto Body & Paint';
    const AutoRepairSalesAndRental_AutoParts                           = 'Auto Parts';
    const AutoRepairSalesAndRental_AutoRepair                          = 'Auto Repair';
    const AutoRepairSalesAndRental_AutoSalesAndService                 = 'Auto Sales & Service';
    const AutoRepairSalesAndRental_AutoWashingAndDetailing             = 'Auto Washing & Detailing';
    const AutoRepairSalesAndRental_BicyclesAndScooters                 = 'Bicycles & Scooters';
    const AutoRepairSalesAndRental_CarpoolingAndRidesharing            = 'Carpooling & Ridesharing';
    const AutoRepairSalesAndRental_OtherTransportationSalesAndServices = 'Other Transportation Sales & Services';
    const AutoRepairSalesAndRental_ParkingLotsAndGarages               = 'Parking Lots & Garages';
    const AutoRepairSalesAndRental_TransitAndShuttleServices           = 'Transit & Shuttle Services';
    /////////////////////////
    
    const BusinessSupportServices_DeliveryServicesAndCouriers          = 'Delivery Services & Couriers';
    const BusinessSupportServices_DocumentManagement                   = 'Document Management';
    const BusinessSupportServices_EventPlanningAndProduction           = 'Event Planning & Production';
    const BusinessSupportServices_HealthServicesConsulting             = 'Health Services Consulting';
    const BusinessSupportServices_InvestigationAndSecurityServices     = 'Investigation & Security Services';
    const BusinessSupportServices_LinenAndUniformSupply                = 'Linen & Uniform Supply';
    const BusinessSupportServices_MeetingAndConferenceFacilities       = 'Meeting & Conference Facilities';
    const BusinessSupportServices_MobileOfficesModularBuildings        = 'Mobile Offices/Modular Buildings';
    const BusinessSupportServices_MovingAndStorage                     = 'Moving & Storage';
    const BusinessSupportServices_OfficeSuppliesEquipmentAndStationery = 'Office Supplies, Equipment & Stationery';
    const BusinessSupportServices_OtherBusinessSupportServices         = 'Other Business Support Services';
    const BusinessSupportServices_PackagingAndMailing                  = 'Packaging & Mailing';
    const BusinessSupportServices_PrintingReproductionAndSigns         = 'Printing, Reproduction & Signs';
    const BusinessSupportServices_PromotionalProducts                  = 'Promotional Products';
    const BusinessSupportServices_VendingAndAmusement                  = 'Vending & Amusement';
    /////////////////////////
    
    const ComputersScienceAndTechnology_ComputerAndNetworkServices                = 'Computer & Network Services';
    const ComputersScienceAndTechnology_ComputerSystemsDesign                     = 'Computer Systems Design	';
    const ComputersScienceAndTechnology_ComputerPrinterSalesAndLeasing            = 'Computer/Printer Sales & Leasing';
    const ComputersScienceAndTechnology_DataProcessingAndHosting                  = 'Data Processing & Hosting';
    const ComputersScienceAndTechnology_ElectronicEquipmentAndComponents          = 'Electronic Equipment & Components';
    const ComputersScienceAndTechnology_InternetDirectoriesGuidesAndSearchPortals = 'Internet Directories, Guides & Search Portals';
    const ComputersScienceAndTechnology_InternetPublishingAndWebhosting           = 'Internet Publishing & Webhosting';
    const ComputersScienceAndTechnology_OtherComputersScienceAndTechnology        = 'Other Computers, Science & Technology';
    const ComputersScienceAndTechnology_ScienceAndTechnologyConsulting            = 'Science & Technology Consulting';
    const ComputersScienceAndTechnology_SoftwareDevelopersAndPublishers           = 'Software Developers & Publishers';
    /////////////////////////
    
    const EducationAndTraining_CampsAndAfterSchoolPrograms = 'Camps & After-school Programs';
    const EducationAndTraining_CollegesAndUniversities     = 'Colleges & Universities';
    const EducationAndTraining_EarlyChildhoodPrograms      = 'Early Childhood Programs';
    const EducationAndTraining_EducationalSupportServices  = 'Educational Support Services';
    const EducationAndTraining_EnvironmentalEducation      = 'Environmental Education';
    const EducationAndTraining_K12Schools                  = 'K-12 Schools';
    const EducationAndTraining_OtherEducationAndTraining   = 'Other Education & Training';
    const EducationAndTraining_ProfessionalAndTradeSchools = 'Professional & Trade Schools';
    const EducationAndTraining_SkillsAndHobbies            = 'Skills & Hobbies';
    /////////////////////////
    
    const FamilyPersonalAndPetServices_BeautySalonsAndDaySpas             = 'Beauty Salons & Day Spas';
    const FamilyPersonalAndPetServices_ChildCare                          = 'Child Care';
    const FamilyPersonalAndPetServices_DiaperServices                     = 'Diaper Services';
    const FamilyPersonalAndPetServices_GarmentCleanersLaundriesAndTailors = 'Garment Cleaners, Laundries & Tailors';
    const FamilyPersonalAndPetServices_MovingAndStorage          	  = 'Moving & Storage';
    const FamilyPersonalAndPetServices_OrganizingServices                 = 'Organizing Services	';
    const FamilyPersonalAndPetServices_OtherFamilyPersonalAndPetServices	  = 'Other Family, Personal & Pet Services';
    const FamilyPersonalAndPetServices_PackagingAndMailing                = 'Packaging & Mailing';
    const FamilyPersonalAndPetServices_PetServicesAndSupplies             = 'Pet Services & Supplies';
    const FamilyPersonalAndPetServices_RetirementCommunities           	  = 'Retirement Communities';
    const FamilyPersonalAndPetServices_SeniorServices                     = 'Senior Services';
    /////////////////////////
    
    const FinanceInsuranceAndRealEstate_AccountantsBookkeepersAndTaxPreparers = 'Accountants, Bookkeepers & Tax Preparers';
    const FinanceInsuranceAndRealEstate_BanksAndCreditUnions                  = 'Banks & Credit Unions';
    const FinanceInsuranceAndRealEstate_CoHousingAndHomeownersAssociations    = 'Co-housing & Homeowners Associations';
    const FinanceInsuranceAndRealEstate_CreditCardIssuers                     = 'Credit Card Issuers';
    const FinanceInsuranceAndRealEstate_FinancialPlanningAndInvestments       = 'Financial Planning & Investments';
    const FinanceInsuranceAndRealEstate_FinancialTransactionsProcessing       = 'Financial Transactions Processing';
    const FinanceInsuranceAndRealEstate_Insurance                             = 'Insurance';
    const FinanceInsuranceAndRealEstate_ManufacturedHomes                     = 'Manufactured Homes';
    const FinanceInsuranceAndRealEstate_MortgagesAndLoans                     = 'Mortgages & Loans';
    const FinanceInsuranceAndRealEstate_OtherFinanceInsuranceAndRealEstate    = 'Other Finance, Insurance & Real Estate';
    const FinanceInsuranceAndRealEstate_PropertyManagementAndLeasing          = 'Property Management & Leasing';
    const FinanceInsuranceAndRealEstate_RealEstateAgentsBrokersAndAppraisers  = 'Real Estate Agents, Brokers & Appraisers';
    const FinanceInsuranceAndRealEstate_RealEstateDevelopment                 = 'Real Estate Development';
    const FinanceInsuranceAndRealEstate_RealEstateStaging                     = 'Real Estate Staging';
    /////////////////////////
    
    const HomeAndBuildingMaintenance_AppliancesAndHomeElectronics          = 'Appliances & Home Electronics';
    const HomeAndBuildingMaintenance_BuildingMaterialsFixturesAndSupplies  = 'Building Materials, Fixtures & Supplies';
    const HomeAndBuildingMaintenance_CarpentersCabinetAndFurnitureMakers   = 'Carpenters, Cabinet & Furniture Makers';
    const HomeAndBuildingMaintenance_CarpetAndUpholstery                   = 'Carpet & Upholstery';
    const HomeAndBuildingMaintenance_CleaningCustodialServicesAndSupplies  = 'Cleaning/Custodial Services & Supplies';
    const HomeAndBuildingMaintenance_ContractorsRemodelersHandymanServices = 'Contractors, Remodelers, Handyman Services';
    const HomeAndBuildingMaintenance_Electricians                          = 'Electricians';
    const HomeAndBuildingMaintenance_EnergyEfficiencyIndoorAirQuality      = 'Energy Efficiency/Indoor Air Quality';
    const HomeAndBuildingMaintenance_EnergyManagement                      = 'Energy Management';
    const HomeAndBuildingMaintenance_Flooring                              = 'Flooring';
    const HomeAndBuildingMaintenance_GardenPatioSuppliesAndNurseries       = 'Garden/Patio Supplies & Nurseries';
    const HomeAndBuildingMaintenance_GreenBuildingConsultants              = 'Green Building Consultants';
    const HomeAndBuildingMaintenance_HardwareStores                        = 'Hardware Stores';
    const HomeAndBuildingMaintenance_HeatingVentilationAndAirConditioning  = 'Heating, Ventilation & Air-conditioning';
    const HomeAndBuildingMaintenance_Inspectors                            = 'Inspectors';
    const HomeAndBuildingMaintenance_Insulation                            = 'Insulation';
    const HomeAndBuildingMaintenance_LandscapeDesignAndMaintenance         = 'Landscape Design & Maintenance';
    const HomeAndBuildingMaintenance_Lighting                              = 'Lighting';
    const HomeAndBuildingMaintenance_LocksmithsAndSecuritySystems          = 'Locksmiths & Security Systems';
    const HomeAndBuildingMaintenance_OtherHomeAndBuildingMaintenance       = 'Other Home & Building Maintenance';
    const HomeAndBuildingMaintenance_PaintPlasterWallFinishing             = 'Paint, Plaster, Wall Finishing';
    const HomeAndBuildingMaintenance_Plumbers                              = 'Plumbers';
    const HomeAndBuildingMaintenance_RoofingAndSiding                      = 'Roofing & Siding';
    const HomeAndBuildingMaintenance_SolarRenewableEnergy                  = 'Solar/Renewable Energy';
    const HomeAndBuildingMaintenance_WindowsAndDoors                       = 'Windows & Doors';
    /////////////////////////
    
    const IndustryAndTrade_IndustrialEquipment              = 'Industrial Equipment';
    const IndustryAndTrade_Machining                        = 'Machining';
    const IndustryAndTrade_Manufacturing                    = 'Manufacturing';
    const IndustryAndTrade_OtherIndustryAndTrade            = 'Other Industry & Trade';
    const IndustryAndTrade_Packaging                        = 'Packaging';
    const IndustryAndTrade_ProductAndIndustrialDesign       = 'Product & Industrial Design';
    const IndustryAndTrade_ResearchAndDevelopment           = 'Research & Development';
    const IndustryAndTrade_RetailDisplayServicesAndSupplies = 'Retail Display Services & Supplies';
    const IndustryAndTrade_WholesaleSuppliesDistribution    = 'Wholesale Supplies/Distribution';
    /////////////////////////
    
    const MediaAndCommunications_AudioAndVideoEquipment                    = 'Audio & Video Equipment';
    const MediaAndCommunications_GraphicAndWebDesign                       = 'Graphic & Web Design';
    const MediaAndCommunications_InternetDirectoriesGuidesAndSearchPortals = 'Internet Directories, Guides & Search Portals';
    const MediaAndCommunications_MarketResearchAndPublicOpinionPolling     = 'Market Research & Public Opinion Polling';
    const MediaAndCommunications_MarketingAdvertisingAndPublicRelations    = 'Marketing, Advertising & Public Relations';
    const MediaAndCommunications_MediaDuplication                          = 'Media Duplication';
    const MediaAndCommunications_OtherMediaAndCommunications               = 'Other Media & Communications';
    const MediaAndCommunications_PhotographersAndPhotographicServices      = 'Photographers & Photographic Services';
    const MediaAndCommunications_Publishers                                = 'Publishers';
    const MediaAndCommunications_RadioAndTelevisionBroadcasting            = 'Radio & Television Broadcasting';
    const MediaAndCommunications_Telecommunications                        = 'Telecommunications';
    const MediaAndCommunications_TranslatingAndInterpreting                = 'Translating & Interpreting';
    const MediaAndCommunications_VideoAndSoundProduction                   = 'Video & Sound Production';
    const MediaAndCommunications_WritingAndEditing                         = 'Writing & Editing';
    /////////////////////////
    
    const OrganizationsAssociationsAndPublicAgencies_AnimalRescueOrganizations                = 'Animal Rescue Organizations';
    const OrganizationsAssociationsAndPublicAgencies_BusinessProfessionalAndTradeAssociations = 'Business, Professional & Trade Associations';
    const OrganizationsAssociationsAndPublicAgencies_CivicAndSocialOrganizations              = 'Civic & Social Organizations';
    const OrganizationsAssociationsAndPublicAgencies_CommunityServicesAndResources            = 'Community Services & Resources';
    const OrganizationsAssociationsAndPublicAgencies_EnvironmentalOrganizations               = 'Environmental Organizations';
    const OrganizationsAssociationsAndPublicAgencies_GrantmakingAndGivingServices             = 'Grantmaking & Giving Services';
    const OrganizationsAssociationsAndPublicAgencies_LaborUnionsAndOrganizations              = 'Labor Unions & Organizations';
    const OrganizationsAssociationsAndPublicAgencies_OtherOrganizationsAndAssociations        = 'Other Organizations & Associations';
    const OrganizationsAssociationsAndPublicAgencies_PoliticalOrganizations                   = 'Political Organizations';
    const OrganizationsAssociationsAndPublicAgencies_PublicAgenciesAndElectedOfficials        = 'Public Agencies & Elected Officials';
    const OrganizationsAssociationsAndPublicAgencies_ReligiousOrganizations                   = 'Religious Organizations';
    const OrganizationsAssociationsAndPublicAgencies_SocialAdvocacyOrganizations              = 'Social Advocacy Organizations';
    /////////////////////////
    
    const ProfessionalServices_AccountantsBookkeepersAndTaxPreparers = 'Accountants, Bookkeepers & Tax Preparers';
    const ProfessionalServices_ArchitectsAndDesigners                = 'Architects & Designers';
    const ProfessionalServices_AttorneysAndLegalServices             = 'Attorneys & Legal Services';
    const ProfessionalServices_EconomicAndDevelopmentConsultants     = 'Economic & Development Consultants';
    const ProfessionalServices_EmploymentAndExecutivePlacement       = 'Employment & Executive Placement';
    const ProfessionalServices_EnergyManagement                      = 'Energy Management';
    const ProfessionalServices_Engineers                             = 'Engineers';
    const ProfessionalServices_EnvironmentalConsultants              = 'Environmental Consultants';
    const ProfessionalServices_EnvironmentalHealthAndSafety          = 'Environmental Health & Safety';
    const ProfessionalServices_EventPlanningAndProduction            = 'Event Planning & Production';
    const ProfessionalServices_FacilitiesAndEquipmentConsultants     = 'Facilities & Equipment Consultants';
    const ProfessionalServices_LandscapeArchitects                   = 'Landscape Architects';
    const ProfessionalServices_ManagementConsultants                 = 'Management Consultants';
    const ProfessionalServices_OtheProfessionalServices              = 'Other Professional Services';
    const ProfessionalServices_ProductAndIndustrialDesign            = 'Product & Industrial Design';
    const ProfessionalServices_TranslatingAndInterpreting            = 'Translating & Interpreting';
    const ProfessionalServices_UrbanPlanningAndDesign                = 'Urban Planning & Design';
    const ProfessionalServices_WritingAndEditing                     = 'Writing & Editing';
    /////////////////////////
    
    const WasteDiversionAndUtilities_BatteriesElectronicsAndOtherSpecialWastes = 'Batteries, Electronics, & Other Special Wastes';
    const WasteDiversionAndUtilities_EnergyProviders                           = 'Energy Providers';
    const WasteDiversionAndUtilities_Hauling                                   = 'Hauling';
    const WasteDiversionAndUtilities_OtherWasteDiversionAndUtilities           = 'Other Waste Diversion & Utilities';
    const WasteDiversionAndUtilities_RecyclingAndWasteManagement               = 'Recycling & Waste Management';
    const WasteDiversionAndUtilities_ReusedSalvagedAndRecycledContentProducts  = 'Reused, Salvaged & Recycled-content Products';
    const WasteDiversionAndUtilities_SolarRenewableEnergy                      = 'Solar/Renewable Energy';
    const WasteDiversionAndUtilities_WaterSupplyAndTreatment                   = 'Water Supply & Treatment';
    const WasteDiversionAndUtilities_YardAndFoodWasteRecycling                 = 'Yard & Food Waste Recycling';
}
