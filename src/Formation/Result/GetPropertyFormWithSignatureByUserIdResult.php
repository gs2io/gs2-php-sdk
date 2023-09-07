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

class GetPropertyFormWithSignatureByUserIdResult implements IResult {
    /** @var PropertyForm */
    private $item;
    /** @var string */
    private $body;
    /** @var string */
    private $signature;
    /** @var PropertyFormModel */
    private $propertyFormModel;

	public function getItem(): ?PropertyForm {
		return $this->item;
	}

	public function setItem(?PropertyForm $item) {
		$this->item = $item;
	}

	public function withItem(?PropertyForm $item): GetPropertyFormWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getBody(): ?string {
		return $this->body;
	}

	public function setBody(?string $body) {
		$this->body = $body;
	}

	public function withBody(?string $body): GetPropertyFormWithSignatureByUserIdResult {
		$this->body = $body;
		return $this;
	}

	public function getSignature(): ?string {
		return $this->signature;
	}

	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

	public function withSignature(?string $signature): GetPropertyFormWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

	public function getPropertyFormModel(): ?PropertyFormModel {
		return $this->propertyFormModel;
	}

	public function setPropertyFormModel(?PropertyFormModel $propertyFormModel) {
		$this->propertyFormModel = $propertyFormModel;
	}

	public function withPropertyFormModel(?PropertyFormModel $propertyFormModel): GetPropertyFormWithSignatureByUserIdResult {
		$this->propertyFormModel = $propertyFormModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetPropertyFormWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetPropertyFormWithSignatureByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? PropertyForm::fromJson($data['item']) : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null)
            ->withPropertyFormModel(array_key_exists('propertyFormModel', $data) && $data['propertyFormModel'] !== null ? PropertyFormModel::fromJson($data['propertyFormModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
            "propertyFormModel" => $this->getPropertyFormModel() !== null ? $this->getPropertyFormModel()->toJson() : null,
        );
    }
}