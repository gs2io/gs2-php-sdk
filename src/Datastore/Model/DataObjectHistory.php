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

namespace Gs2\Datastore\Model;

use Gs2\Core\Model\IModel;


class DataObjectHistory implements IModel {
	/**
     * @var string
	 */
	private $dataObjectHistoryId;
	/**
     * @var string
	 */
	private $dataObjectName;
	/**
     * @var string
	 */
	private $generation;
	/**
     * @var int
	 */
	private $contentLength;
	/**
     * @var int
	 */
	private $createdAt;

	public function getDataObjectHistoryId(): ?string {
		return $this->dataObjectHistoryId;
	}

	public function setDataObjectHistoryId(?string $dataObjectHistoryId) {
		$this->dataObjectHistoryId = $dataObjectHistoryId;
	}

	public function withDataObjectHistoryId(?string $dataObjectHistoryId): DataObjectHistory {
		$this->dataObjectHistoryId = $dataObjectHistoryId;
		return $this;
	}

	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}

	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}

	public function withDataObjectName(?string $dataObjectName): DataObjectHistory {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}

	public function getGeneration(): ?string {
		return $this->generation;
	}

	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	public function withGeneration(?string $generation): DataObjectHistory {
		$this->generation = $generation;
		return $this;
	}

	public function getContentLength(): ?int {
		return $this->contentLength;
	}

	public function setContentLength(?int $contentLength) {
		$this->contentLength = $contentLength;
	}

	public function withContentLength(?int $contentLength): DataObjectHistory {
		$this->contentLength = $contentLength;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): DataObjectHistory {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?DataObjectHistory {
        if ($data === null) {
            return null;
        }
        return (new DataObjectHistory())
            ->withDataObjectHistoryId(empty($data['dataObjectHistoryId']) ? null : $data['dataObjectHistoryId'])
            ->withDataObjectName(empty($data['dataObjectName']) ? null : $data['dataObjectName'])
            ->withGeneration(empty($data['generation']) ? null : $data['generation'])
            ->withContentLength(empty($data['contentLength']) && $data['contentLength'] !== 0 ? null : $data['contentLength'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "dataObjectHistoryId" => $this->getDataObjectHistoryId(),
            "dataObjectName" => $this->getDataObjectName(),
            "generation" => $this->getGeneration(),
            "contentLength" => $this->getContentLength(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}