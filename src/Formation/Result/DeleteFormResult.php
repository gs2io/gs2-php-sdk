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

class DeleteFormResult implements IResult {
    /** @var Form */
    private $item;
    /** @var Mold */
    private $mold;
    /** @var MoldModel */
    private $moldModel;
    /** @var FormModel */
    private $formModel;

	public function getItem(): ?Form {
		return $this->item;
	}

	public function setItem(?Form $item) {
		$this->item = $item;
	}

	public function withItem(?Form $item): DeleteFormResult {
		$this->item = $item;
		return $this;
	}

	public function getMold(): ?Mold {
		return $this->mold;
	}

	public function setMold(?Mold $mold) {
		$this->mold = $mold;
	}

	public function withMold(?Mold $mold): DeleteFormResult {
		$this->mold = $mold;
		return $this;
	}

	public function getMoldModel(): ?MoldModel {
		return $this->moldModel;
	}

	public function setMoldModel(?MoldModel $moldModel) {
		$this->moldModel = $moldModel;
	}

	public function withMoldModel(?MoldModel $moldModel): DeleteFormResult {
		$this->moldModel = $moldModel;
		return $this;
	}

	public function getFormModel(): ?FormModel {
		return $this->formModel;
	}

	public function setFormModel(?FormModel $formModel) {
		$this->formModel = $formModel;
	}

	public function withFormModel(?FormModel $formModel): DeleteFormResult {
		$this->formModel = $formModel;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteFormResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteFormResult())
            ->withItem(empty($data['item']) ? null : Form::fromJson($data['item']))
            ->withMold(empty($data['mold']) ? null : Mold::fromJson($data['mold']))
            ->withMoldModel(empty($data['moldModel']) ? null : MoldModel::fromJson($data['moldModel']))
            ->withFormModel(empty($data['formModel']) ? null : FormModel::fromJson($data['formModel']));
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