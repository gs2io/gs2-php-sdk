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

class GetPropertyFormByUserIdResult implements IResult {
    /** @var PropertyForm */
    private $item;
    /** @var PropertyFormModel */
    private $propertyFormModel;

	public function getItem(): ?PropertyForm {
		return $this->item;
	}

	public function setItem(?PropertyForm $item) {
		$this->item = $item;
	}

	public function withItem(?PropertyForm $item): GetPropertyFormByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getPropertyFormModel(): ?PropertyFormModel {
		return $this->propertyFormModel;
	}

	public function setPropertyFormModel(?PropertyFormModel $propertyFormModel) {
		$this->propertyFormModel = $propertyFormModel;
	}

	public function withPropertyFormModel(?PropertyFormModel $propertyFormModel): GetPropertyFormByUserIdResult {
		$this->propertyFormModel = $propertyFormModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPropertyFormByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetPropertyFormByUserIdResult())
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