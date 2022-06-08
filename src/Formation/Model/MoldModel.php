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


class MoldModel implements IModel {
	/**
     * @var string
	 */
	private $moldModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $initialMaxCapacity;
	/**
     * @var int
	 */
	private $maxCapacity;
	/**
     * @var FormModel
	 */
	private $formModel;
	public function getMoldModelId(): ?string {
		return $this->moldModelId;
	}
	public function setMoldModelId(?string $moldModelId) {
		$this->moldModelId = $moldModelId;
	}
	public function withMoldModelId(?string $moldModelId): MoldModel {
		$this->moldModelId = $moldModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): MoldModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): MoldModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}
	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}
	public function withInitialMaxCapacity(?int $initialMaxCapacity): MoldModel {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
	public function withMaxCapacity(?int $maxCapacity): MoldModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	public function getFormModel(): ?FormModel {
		return $this->formModel;
	}
	public function setFormModel(?FormModel $formModel) {
		$this->formModel = $formModel;
	}
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