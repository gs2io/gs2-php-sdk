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

class UpdateMoldModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $moldName;
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

	public function withNamespaceName(?string $namespaceName): UpdateMoldModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getMoldName(): ?string {
		return $this->moldName;
	}

	public function setMoldName(?string $moldName) {
		$this->moldName = $moldName;
	}

	public function withMoldName(?string $moldName): UpdateMoldModelMasterRequest {
		$this->moldName = $moldName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateMoldModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateMoldModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getFormModelName(): ?string {
		return $this->formModelName;
	}

	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}

	public function withFormModelName(?string $formModelName): UpdateMoldModelMasterRequest {
		$this->formModelName = $formModelName;
		return $this;
	}

	public function getInitialMaxCapacity(): ?int {
		return $this->initialMaxCapacity;
	}

	public function setInitialMaxCapacity(?int $initialMaxCapacity) {
		$this->initialMaxCapacity = $initialMaxCapacity;
	}

	public function withInitialMaxCapacity(?int $initialMaxCapacity): UpdateMoldModelMasterRequest {
		$this->initialMaxCapacity = $initialMaxCapacity;
		return $this;
	}

	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}

	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}

	public function withMaxCapacity(?int $maxCapacity): UpdateMoldModelMasterRequest {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMoldModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMoldModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withMoldName(empty($data['moldName']) ? null : $data['moldName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withFormModelName(empty($data['formModelName']) ? null : $data['formModelName'])
            ->withInitialMaxCapacity(empty($data['initialMaxCapacity']) && $data['initialMaxCapacity'] !== 0 ? null : $data['initialMaxCapacity'])
            ->withMaxCapacity(empty($data['maxCapacity']) && $data['maxCapacity'] !== 0 ? null : $data['maxCapacity']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "moldName" => $this->getMoldName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "formModelName" => $this->getFormModelName(),
            "initialMaxCapacity" => $this->getInitialMaxCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
        );
    }
}