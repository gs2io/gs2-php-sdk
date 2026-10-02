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
 * Result of getForm: Get Form
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#getform
 */
class GetFormResult implements IResult {
    /** @var Form Form */
    private $item;
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
     * @return GetFormResult
     */
	public function withItem(?Form $item): GetFormResult {
		$this->item = $item;
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
     * @return GetFormResult
     */
	public function withMold(?Mold $mold): GetFormResult {
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
     * @return GetFormResult
     */
	public function withMoldModel(?MoldModel $moldModel): GetFormResult {
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
     * @return GetFormResult
     */
	public function withFormModel(?FormModel $formModel): GetFormResult {
		$this->formModel = $formModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetFormResult {
        if ($data === null) {
            return null;
        }
        return (new GetFormResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Form::fromJson($data['item']) : null)
            ->withMold(array_key_exists('mold', $data) && $data['mold'] !== null ? Mold::fromJson($data['mold']) : null)
            ->withMoldModel(array_key_exists('moldModel', $data) && $data['moldModel'] !== null ? MoldModel::fromJson($data['moldModel']) : null)
            ->withFormModel(array_key_exists('formModel', $data) && $data['formModel'] !== null ? FormModel::fromJson($data['formModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "mold" => $this->getMold() !== null ? $this->getMold()->toJson() : null,
            "moldModel" => $this->getMoldModel() !== null ? $this->getMoldModel()->toJson() : null,
            "formModel" => $this->getFormModel() !== null ? $this->getFormModel()->toJson() : null,
        );
    }
}