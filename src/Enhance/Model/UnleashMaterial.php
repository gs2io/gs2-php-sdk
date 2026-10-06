<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


/**
 * Unleash Material
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashmaterial
 */
class UnleashMaterial implements IModel {
	/**
     * @var string Material name
	 */
	private $name;
	/**
     * @var string Type of material
	 */
	private $materialType;
	/**
     * @var UnleashIndividualMaterialSetting Individual material setting
	 */
	private $individualSetting;
	/**
     * @var UnleashQuantityMaterialSetting Quantity material setting
	 */
	private $quantitySetting;
    /** @return string|null Material name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Material name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Material name
     * @return UnleashMaterial
     */
	public function withName(?string $name): UnleashMaterial {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Type of material */
	public function getMaterialType(): ?string {
		return $this->materialType;
	}
    /** @param string|null $materialType Type of material */
	public function setMaterialType(?string $materialType) {
		$this->materialType = $materialType;
	}
    /**
     * @param string|null $materialType Type of material
     * @return UnleashMaterial
     */
	public function withMaterialType(?string $materialType): UnleashMaterial {
		$this->materialType = $materialType;
		return $this;
	}
    /** @return UnleashIndividualMaterialSetting|null Individual material setting */
	public function getIndividualSetting(): ?UnleashIndividualMaterialSetting {
		return $this->individualSetting;
	}
    /** @param UnleashIndividualMaterialSetting|null $individualSetting Individual material setting */
	public function setIndividualSetting(?UnleashIndividualMaterialSetting $individualSetting) {
		$this->individualSetting = $individualSetting;
	}
    /**
     * @param UnleashIndividualMaterialSetting|null $individualSetting Individual material setting
     * @return UnleashMaterial
     */
	public function withIndividualSetting(?UnleashIndividualMaterialSetting $individualSetting): UnleashMaterial {
		$this->individualSetting = $individualSetting;
		return $this;
	}
    /** @return UnleashQuantityMaterialSetting|null Quantity material setting */
	public function getQuantitySetting(): ?UnleashQuantityMaterialSetting {
		return $this->quantitySetting;
	}
    /** @param UnleashQuantityMaterialSetting|null $quantitySetting Quantity material setting */
	public function setQuantitySetting(?UnleashQuantityMaterialSetting $quantitySetting) {
		$this->quantitySetting = $quantitySetting;
	}
    /**
     * @param UnleashQuantityMaterialSetting|null $quantitySetting Quantity material setting
     * @return UnleashMaterial
     */
	public function withQuantitySetting(?UnleashQuantityMaterialSetting $quantitySetting): UnleashMaterial {
		$this->quantitySetting = $quantitySetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashMaterial {
        if ($data === null) {
            return null;
        }
        return (new UnleashMaterial())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMaterialType(array_key_exists('materialType', $data) && $data['materialType'] !== null ? $data['materialType'] : null)
            ->withIndividualSetting(array_key_exists('individualSetting', $data) && $data['individualSetting'] !== null ? UnleashIndividualMaterialSetting::fromJson($data['individualSetting']) : null)
            ->withQuantitySetting(array_key_exists('quantitySetting', $data) && $data['quantitySetting'] !== null ? UnleashQuantityMaterialSetting::fromJson($data['quantitySetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "materialType" => $this->getMaterialType(),
            "individualSetting" => $this->getIndividualSetting() !== null ? $this->getIndividualSetting()->toJson() : null,
            "quantitySetting" => $this->getQuantitySetting() !== null ? $this->getQuantitySetting()->toJson() : null,
        );
    }
}