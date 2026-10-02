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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


/**
 * Form Storage Area Model
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#moldmodel
 */
class MoldModel implements IModel {
	/**
     * @var string Form Storage Area GRN
	 */
	private $moldModelId;
	/**
     * @var string Form Storage Area Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Initial capacity to store forms
	 */
	private $initialMaxCapacity;
	/**
     * @var int Maximum capacity to store forms
	 */
	private $maxCapacity;
	/**
     * @var FormModel Form Model
	 */
	private $formModel;
    /** @return string|null Form Storage Area GRN */
	public function getMoldModelId(): ?string {
		return $this->moldModelId;
	}
    /** @param string|null $moldModelId Form Storage Area GRN */
	public function setMoldModelId(?string $moldModelId) {
		$this->moldModelId = $moldModelId;
	}
    /**
     * @param string|null $moldModelId Form Storage Area GRN
     * @return MoldModel
     */
	public function withMoldModelId(?string $moldModelId): MoldModel {
		$this->moldModelId = $moldModelId;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Form Storage Area Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Form Storage Area Model name
     * @return MoldModel
     */
	public function withName(?string $name): MoldModel {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return MoldModel
     */
	public function withMetadata(?string $metadata): MoldModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Initial capacity to store forms */
	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}
    /** @param int|null $initialMaxCapacity Initial capacity to store forms */
	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}
    /**
     * @param int|null $initialMaxCapacity Initial capacity to store forms
     * @return MoldModel
     */
	public function withInitialMaxCapacity(?int $initialMaxCapacity): MoldModel {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}
    /** @return int|null Maximum capacity to store forms */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
    /** @param int|null $maxCapacity Maximum capacity to store forms */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
    /**
     * @param int|null $maxCapacity Maximum capacity to store forms
     * @return MoldModel
     */
	public function withMaxCapacity(?int $maxCapacity): MoldModel {
		$this->maxCapacity = $maxCapacity;
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
     * @return MoldModel
     */
	public function withFormModel(?FormModel $formModel): MoldModel {
		$this->formModel = $formModel;
		return $this;
	}

    public static function fromJson(?array $data): ?MoldModel {
        if ($data === null) {
            return null;
        }
        return (new MoldModel())
            ->withMoldModelId(array_key_exists('moldModelId', $data) && $data['moldModelId'] !== null ? $data['moldModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialMaxCapacity(array_key_exists('initialMaxCapacity', $data) && $data['initialMaxCapacity'] !== null ? $data['initialMaxCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withFormModel(array_key_exists('formModel', $data) && $data['formModel'] !== null ? FormModel::fromJson($data['formModel']) : null);
    }

    public function toJson(): array {
        return array(
            "moldModelId" => $this->getMoldModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "initialMaxCapacity" => $this->getInitialMaxCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "formModel" => $this->getFormModel() !== null ? $this->getFormModel()->toJson() : null,
        );
    }
}