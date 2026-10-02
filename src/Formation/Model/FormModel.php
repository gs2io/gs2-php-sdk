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
 * Form Model
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#formmodel
 */
class FormModel implements IModel {
	/**
     * @var string Form Model GRN
	 */
	private $formModelId;
	/**
     * @var string Form Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Slot Model
	 */
	private $slots;
    /** @return string|null Form Model GRN */
	public function getFormModelId(): ?string {
		return $this->formModelId;
	}
    /** @param string|null $formModelId Form Model GRN */
	public function setFormModelId(?string $formModelId) {
		$this->formModelId = $formModelId;
	}
    /**
     * @param string|null $formModelId Form Model GRN
     * @return FormModel
     */
	public function withFormModelId(?string $formModelId): FormModel {
		$this->formModelId = $formModelId;
		return $this;
	}
    /** @return string|null Form Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Form Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Form Model name
     * @return FormModel
     */
	public function withName(?string $name): FormModel {
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
     * @return FormModel
     */
	public function withMetadata(?string $metadata): FormModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Slot Model */
	public function getSlots(): ?array {
		return $this->slots;
	}
    /** @param array|null $slots List of Slot Model */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
    /**
     * @param array|null $slots List of Slot Model
     * @return FormModel
     */
	public function withSlots(?array $slots): FormModel {
		$this->slots = $slots;
		return $this;
	}

    public static function fromJson(?array $data): ?FormModel {
        if ($data === null) {
            return null;
        }
        return (new FormModel())
            ->withFormModelId(array_key_exists('formModelId', $data) && $data['formModelId'] !== null ? $data['formModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return SlotModel::fromJson($item);
                },
                $data['slots']
            ));
    }

    public function toJson(): array {
        return array(
            "formModelId" => $this->getFormModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
        );
    }
}