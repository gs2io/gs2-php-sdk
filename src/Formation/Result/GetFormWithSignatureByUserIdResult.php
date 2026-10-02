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
use Gs2\Formation\Model\Form;
use Gs2\Formation\Model\Mold;
use Gs2\Formation\Model\SlotModel;
use Gs2\Formation\Model\FormModel;
use Gs2\Formation\Model\MoldModel;

/**
 * Result of getFormWithSignatureByUserId: Get signed Form by User ID
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#getformwithsignaturebyuserid
 */
class GetFormWithSignatureByUserIdResult implements IResult {
    /** @var Form Form */
    private $item;
    /** @var string Value to be signed */
    private $body;
    /** @var string Signature */
    private $signature;
    /** @var Mold Form Storage Area */
    private $mold;
    /** @var MoldModel Form Storage Area Model */
    private $moldModel;
    /** @var FormModel Form Model */
    private $formModel;

    /** @return Form|null Form */
	public function getItem(): ?Form {
		return $this->item;
	}

    /** @param Form|null $item Form */
	public function setItem(?Form $item) {
		$this->item = $item;
	}

    /**
     * @param Form|null $item Form
     * @return GetFormWithSignatureByUserIdResult
     */
	public function withItem(?Form $item): GetFormWithSignatureByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Value to be signed */
	public function getBody(): ?string {
		return $this->body;
	}

    /** @param string|null $body Value to be signed */
	public function setBody(?string $body) {
		$this->body = $body;
	}

    /**
     * @param string|null $body Value to be signed
     * @return GetFormWithSignatureByUserIdResult
     */
	public function withBody(?string $body): GetFormWithSignatureByUserIdResult {
		$this->body = $body;
		return $this;
	}

    /** @return string|null Signature */
	public function getSignature(): ?string {
		return $this->signature;
	}

    /** @param string|null $signature Signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    /**
     * @param string|null $signature Signature
     * @return GetFormWithSignatureByUserIdResult
     */
	public function withSignature(?string $signature): GetFormWithSignatureByUserIdResult {
		$this->signature = $signature;
		return $this;
	}

    /** @return Mold|null Form Storage Area */
	public function getMold(): ?Mold {
		return $this->mold;
	}

    /** @param Mold|null $mold Form Storage Area */
	public function setMold(?Mold $mold) {
		$this->mold = $mold;
	}

    /**
     * @param Mold|null $mold Form Storage Area
     * @return GetFormWithSignatureByUserIdResult
     */
	public function withMold(?Mold $mold): GetFormWithSignatureByUserIdResult {
		$this->mold = $mold;
		return $this;
	}

    /** @return MoldModel|null Form Storage Area Model */
	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

    /** @param MoldModel|null $moldModel Form Storage Area Model */
	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

    /**
     * @param MoldModel|null $moldModel Form Storage Area Model
     * @return GetFormWithSignatureByUserIdResult
     */
	public function withMoldModel(?MoldModel $moldModel): GetFormWithSignatureByUserIdResult {
		$this->moldModel = $moldModel;
		return $this;
	}

    /** @return FormModel|null Form Model */
	public function getFormModel(): ?FormModel {
		return $this->formModel;
	}

    /** @param FormModel|null $formModel Form Model */
	public function setFormModel(?FormModel $formModel) {
		$this->formModel = $formModel;
	}

    /**
     * @param FormModel|null $formModel Form Model
     * @return GetFormWithSignatureByUserIdResult
     */
	public function withFormModel(?FormModel $formModel): GetFormWithSignatureByUserIdResult {
		$this->formModel = $formModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetFormWithSignatureByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetFormWithSignatureByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Form::fromJson($data['item']) : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null)
            ->withMold(array_key_exists('mold', $data) && $data['mold'] !== null ? Mold::fromJson($data['mold']) : null)
            ->withMoldModel(array_key_exists('moldModel', $data) && $data['moldModel'] !== null ? MoldModel::fromJson($data['moldModel']) : null)
            ->withFormModel(array_key_exists('formModel', $data) && $data['formModel'] !== null ? FormModel::fromJson($data['formModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
            "mold" => $this->getMold() !== null ? $this->getMold()->toJson() : null,
            "moldModel" => $this->getMoldModel() !== null ? $this->getMoldModel()->toJson() : null,
            "formModel" => $this->getFormModel() !== null ? $this->getFormModel()->toJson() : null,
        );
    }
}