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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


class ScopedValue implements IModel {
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var int
	 */
	private $value;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getResetType(): ?string {
		return $this->resetType;
	}

	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	public function withResetType(?string $resetType): ScopedValue {
		$this->resetType = $resetType;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): ScopedValue {
		$this->value = $value;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): ScopedValue {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?ScopedValue {
        if ($data === null) {
            return null;
        }
        return (new ScopedValue())
            ->withResetType(empty($data['resetType']) ? null : $data['resetType'])
            ->withValue(empty($data['value']) ? null : $data['value'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "resetType" => $this->getResetType(),
            "value" => $this->getValue(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}