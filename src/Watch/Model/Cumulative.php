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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;


class Cumulative implements IModel {
	/**
     * @var string
	 */
	private $cumulativeId;
	/**
     * @var string
	 */
	private $resourceGrn;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $value;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getCumulativeId(): ?string {
		return $this->cumulativeId;
	}

	public function setCumulativeId(?string $cumulativeId) {
		$this->cumulativeId = $cumulativeId;
	}

	public function withCumulativeId(?string $cumulativeId): Cumulative {
		$this->cumulativeId = $cumulativeId;
		return $this;
	}

	public function getResourceGrn(): ?string {
		return $this->resourceGrn;
	}

	public function setResourceGrn(?string $resourceGrn) {
		$this->resourceGrn = $resourceGrn;
	}

	public function withResourceGrn(?string $resourceGrn): Cumulative {
		$this->resourceGrn = $resourceGrn;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Cumulative {
		$this->name = $name;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): Cumulative {
		$this->value = $value;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Cumulative {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Cumulative {
        if ($data === null) {
            return null;
        }
        return (new Cumulative())
            ->withCumulativeId(array_key_exists('cumulativeId', $data) && $data['cumulativeId'] !== null ? $data['cumulativeId'] : null)
            ->withResourceGrn(array_key_exists('resourceGrn', $data) && $data['resourceGrn'] !== null ? $data['resourceGrn'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "cumulativeId" => $this->getCumulativeId(),
            "resourceGrn" => $this->getResourceGrn(),
            "name" => $this->getName(),
            "value" => $this->getValue(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}