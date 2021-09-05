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

namespace Gs2\Deploy\Model;

use Gs2\Core\Model\IModel;


class Output implements IModel {
	/**
     * @var string
	 */
	private $outputId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $value;
	/**
     * @var int
	 */
	private $createdAt;

	public function getOutputId(): ?string {
		return $this->outputId;
	}

	public function setOutputId(?string $outputId) {
		$this->outputId = $outputId;
	}

	public function withOutputId(?string $outputId): Output {
		$this->outputId = $outputId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Output {
		$this->name = $name;
		return $this;
	}

	public function getValue(): ?string {
		return $this->value;
	}

	public function setValue(?string $value) {
		$this->value = $value;
	}

	public function withValue(?string $value): Output {
		$this->value = $value;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Output {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Output {
        if ($data === null) {
            return null;
        }
        return (new Output())
            ->withOutputId(empty($data['outputId']) ? null : $data['outputId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withValue(empty($data['value']) ? null : $data['value'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "outputId" => $this->getOutputId(),
            "name" => $this->getName(),
            "value" => $this->getValue(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}