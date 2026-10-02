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
 * Result of setPropertyFormWithSignature: Update Property Form with signed slots
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#setpropertyformwithsignature
 */
class SetPropertyFormWithSignatureResult implements IResult {
    /** @var PropertyForm Property Form */
    private $item;
    /** @var PropertyFormModel Property Form Model */
    private $proeprtyFormModel;

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
     * @return SetPropertyFormWithSignatureResult
     */
	public function withItem(?PropertyForm $item): SetPropertyFormWithSignatureResult {
		$this->item = $item;
		return $this;
	}

    /** @return PropertyFormModel|null Property Form Model */
	public function getProeprtyFormModel(): ?PropertyFormModel {
		return $this->proeprtyFormModel;
	}

    /** @param PropertyFormModel|null $proeprtyFormModel Property Form Model */
	public function setProeprtyFormModel(?PropertyFormModel $proeprtyFormModel) {
		$this->proeprtyFormModel = $proeprtyFormModel;
	}

    /**
     * @param PropertyFormModel|null $proeprtyFormModel Property Form Model
     * @return SetPropertyFormWithSignatureResult
     */
	public function withProeprtyFormModel(?PropertyFormModel $proeprtyFormModel): SetPropertyFormWithSignatureResult {
		$this->proeprtyFormModel = $proeprtyFormModel;
		return $this;
	}

    public static function fromJson(?array $data): ?SetPropertyFormWithSignatureResult {
        if ($data === null) {
            return null;
        }
        return (new SetPropertyFormWithSignatureResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? PropertyForm::fromJson($data['item']) : null)
            ->withProeprtyFormModel(array_key_exists('proeprtyFormModel', $data) && $data['proeprtyFormModel'] !== null ? PropertyFormModel::fromJson($data['proeprtyFormModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "proeprtyFormModel" => $this->getProeprtyFormModel() !== null ? $this->getProeprtyFormModel()->toJson() : null,
        );
    }
}