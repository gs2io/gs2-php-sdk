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


/**
 * Data Object History
 *
 * @see https://docs.gs2.io/api_reference/datastore/sdk/#dataobjecthistory
 */
class DataObjectHistory implements IModel {
	/**
     * @var string Data Object History GRN
	 */
	private $dataObjectHistoryId;
	/**
     * @var string Data Object Name
	 */
	private $dataObjectName;
	/**
     * @var string Generation ID
	 */
	private $generation;
	/**
     * @var int File size
	 */
	private $contentLength;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Data Object History GRN */
	public function getDataObjectHistoryId(): ?string {
		return $this->dataObjectHistoryId;
	}
    /** @param string|null $dataObjectHistoryId Data Object History GRN */
	public function setDataObjectHistoryId(?string $dataObjectHistoryId) {
		$this->dataObjectHistoryId = $dataObjectHistoryId;
	}
    /**
     * @param string|null $dataObjectHistoryId Data Object History GRN
     * @return DataObjectHistory
     */
	public function withDataObjectHistoryId(?string $dataObjectHistoryId): DataObjectHistory {
		$this->dataObjectHistoryId = $dataObjectHistoryId;
		return $this;
	}
    /** @return string|null Data Object Name */
	public function getDataObjectName(): ?string {
		return $this->dataObjectName;
	}
    /** @param string|null $dataObjectName Data Object Name */
	public function setDataObjectName(?string $dataObjectName) {
		$this->dataObjectName = $dataObjectName;
	}
    /**
     * @param string|null $dataObjectName Data Object Name
     * @return DataObjectHistory
     */
	public function withDataObjectName(?string $dataObjectName): DataObjectHistory {
		$this->dataObjectName = $dataObjectName;
		return $this;
	}
    /** @return string|null Generation ID */
	public function getGeneration(): ?string {
		return $this->generation;
	}
    /** @param string|null $generation Generation ID */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}
    /**
     * @param string|null $generation Generation ID
     * @return DataObjectHistory
     */
	public function withGeneration(?string $generation): DataObjectHistory {
		$this->generation = $generation;
		return $this;
	}
    /** @return int|null File size */
	public function getContentLength(): ?int {
		return $this->contentLength;
	}
    /** @param int|null $contentLength File size */
	public function setContentLength(?int $contentLength) {
		$this->contentLength = $contentLength;
	}
    /**
     * @param int|null $contentLength File size
     * @return DataObjectHistory
     */
	public function withContentLength(?int $contentLength): DataObjectHistory {
		$this->contentLength = $contentLength;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return DataObjectHistory
     */
	public function withCreatedAt(?int $createdAt): DataObjectHistory {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return DataObjectHistory
     */
	public function withRevision(?int $revision): DataObjectHistory {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?DataObjectHistory {
        if ($data === null) {
            return null;
        }
        return (new DataObjectHistory())
            ->withDataObjectHistoryId(array_key_exists('dataObjectHistoryId', $data) && $data['dataObjectHistoryId'] !== null ? $data['dataObjectHistoryId'] : null)
            ->withDataObjectName(array_key_exists('dataObjectName', $data) && $data['dataObjectName'] !== null ? $data['dataObjectName'] : null)
            ->withGeneration(array_key_exists('generation', $data) && $data['generation'] !== null ? $data['generation'] : null)
            ->withContentLength(array_key_exists('contentLength', $data) && $data['contentLength'] !== null ? $data['contentLength'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "dataObjectHistoryId" => $this->getDataObjectHistoryId(),
            "dataObjectName" => $this->getDataObjectName(),
            "generation" => $this->getGeneration(),
            "contentLength" => $this->getContentLength(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}