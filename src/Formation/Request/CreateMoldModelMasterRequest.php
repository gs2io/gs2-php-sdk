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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateMoldModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $formModelName;
    /** @var int */
    private $initialMaxCapacity;
    /** @var int */
    private $maxCapacity;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateMoldModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateMoldModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateMoldModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateMoldModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getFormModelName(): ?string {
		return $this->formModelName;
	}

	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}

	public function withFormModelName(?string $formModelName): CreateMoldModelMasterRequest {
		$this->formModelName = $formModelName;
		return $this;
	}

	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}

	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}

	public function withInitialMaxCapacity(?int $initialMaxCapacity): CreateMoldModelMasterRequest {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): CreateMoldModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateMoldModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateMoldModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withFormModelName(empty($data['formModelName']) ? null : $data['formModelName'])
            ->withInitialMaxCapacity(empty($data['initialMaxCapacity']) ? null : $data['initialMaxCapacity'])
            ->withMaxCapacity(empty($data['maxCapacity']) ? null : $data['maxCapacity']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "formModelName" => $this->getFormModelName(),
            "initialMaxCapacity" => $this->getInitialMaxCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
        );
    }
}