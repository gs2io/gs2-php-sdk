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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateLimitModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $resetType;
    /** @var int */
    private $resetDayOfMonth;
    /** @var string */
    private $resetDayOfWeek;
    /** @var int */
    private $resetHour;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): CreateLimitModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateLimitModelMasterRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateLimitModelMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): CreateLimitModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getResetType(): ?string {
		return $this->resetType;
	}

	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	public function withResetType(?string $resetType): CreateLimitModelMasterRequest {
		$this->resetType = $resetType;
		return $this;
	}

	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	public function withResetDayOfMonth(?int $resetDayOfMonth): CreateLimitModelMasterRequest {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}

	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	public function withResetDayOfWeek(?string $resetDayOfWeek): CreateLimitModelMasterRequest {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}

	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	public function withResetHour(?int $resetHour): CreateLimitModelMasterRequest {
		$this->resetHour = $resetHour;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateLimitModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateLimitModelMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withResetType(empty($data['resetType']) ? null : $data['resetType'])
            ->withResetDayOfMonth(empty($data['resetDayOfMonth']) ? null : $data['resetDayOfMonth'])
            ->withResetDayOfWeek(empty($data['resetDayOfWeek']) ? null : $data['resetDayOfWeek'])
            ->withResetHour(empty($data['resetHour']) ? null : $data['resetHour']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
        );
    }
}