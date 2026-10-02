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

namespace Gs2\Formation\Result;

use Gs2\Core\Model\IResult;
use Gs2\Formation\Model\Slot;
use Gs2\Formation\Model\PropertyForm;
use Gs2\Formation\Model\SlotModel;
use Gs2\Formation\Model\PropertyFormModel;

/**
 * Result of setPropertyFormByUserId: Update Property Form by User ID
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformbyuserid
 */
class SetPropertyFormByUserIdResult implements IResult {
    /** @var PropertyForm Property Form */
    private $item;
    /** @var PropertyFormModel Property Form Model */
    private $propertyFormModel;

    /** @return PropertyForm|null Property Form */
	public function getItem(): ?PropertyForm {
		return $this->item;
	}

    /** @param PropertyForm|null $item Property Form */
	public function setItem(?PropertyForm $item) {
		$this->item = $item;
	}

    /**
     * @param PropertyForm|null $item Property Form
     * @return SetPropertyFormByUserIdResult
     */
	public function withItem(?PropertyForm $item): SetPropertyFormByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return PropertyFormModel|null Property Form Model */
	public function getPropertyFormModel(): ?PropertyFormModel {
		return $this->propertyFormModel;
	}

    /** @param PropertyFormModel|null $propertyFormModel Property Form Model */
	public function setPropertyFormModel(?PropertyFormModel $propertyFormModel) {
		$this->propertyFormModel = $propertyFormModel;
	}

    /**
     * @param PropertyFormModel|null $propertyFormModel Property Form Model
     * @return SetPropertyFormByUserIdResult
     */
	public function withPropertyFormModel(?PropertyFormModel $propertyFormModel): SetPropertyFormByUserIdResult {
		$this->propertyFormModel = $propertyFormModel;
		return $this;
	}

    public static function fromJson(?array $data): ?SetPropertyFormByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SetPropertyFormByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? PropertyForm::fromJson($data['item']) : null)
            ->withPropertyFormModel(array_key_exists('propertyFormModel', $data) && $data['propertyFormModel'] !== null ? PropertyFormModel::fromJson($data['propertyFormModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "propertyFormModel" => $this->getPropertyFormModel() !== null ? $this->getPropertyFormModel()->toJson() : null,
        );
    }
}