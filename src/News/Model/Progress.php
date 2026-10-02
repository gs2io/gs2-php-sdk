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

namespace Gs2\News\Model;

use Gs2\Core\Model\IModel;


/**
 * Progress
 *
 * @see https://docs.gs2.io/api_reference/news/sdk/#progress
 */
class Progress implements IModel {
	/**
     * @var string Content generation progress GRN
	 */
	private $progressId;
	/**
     * @var string Upload Token
	 */
	private $uploadToken;
	/**
     * @var int Generated Count
	 */
	private $generated;
	/**
     * @var int Pattern Count
	 */
	private $patternCount;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Content generation progress GRN */
	public function getProgressId(): ?string {
		return $this->progressId;
	}
    /** @param string|null $progressId Content generation progress GRN */
	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}
    /**
     * @param string|null $progressId Content generation progress GRN
     * @return Progress
     */
	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
		return $this;
	}
    /** @return string|null Upload Token */
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
    /** @param string|null $uploadToken Upload Token */
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
    /**
     * @param string|null $uploadToken Upload Token
     * @return Progress
     */
	public function withUploadToken(?string $uploadToken): Progress {
		$this->uploadToken = $uploadToken;
		return $this;
	}
    /** @return int|null Generated Count */
	public function getGenerated(): ?int {
		return $this->generated;
	}
    /** @param int|null $generated Generated Count */
	public function setGenerated(?int $generated) {
		$this->generated = $generated;
	}
    /**
     * @param int|null $generated Generated Count
     * @return Progress
     */
	public function withGenerated(?int $generated): Progress {
		$this->generated = $generated;
		return $this;
	}
    /** @return int|null Pattern Count */
	public function getPatternCount(): ?int {
		return $this->patternCount;
	}
    /** @param int|null $patternCount Pattern Count */
	public function setPatternCount(?int $patternCount) {
		$this->patternCount = $patternCount;
	}
    /**
     * @param int|null $patternCount Pattern Count
     * @return Progress
     */
	public function withPatternCount(?int $patternCount): Progress {
		$this->patternCount = $patternCount;
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
     * @return Progress
     */
	public function withCreatedAt(?int $createdAt): Progress {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Progress
     */
	public function withUpdatedAt(?int $updatedAt): Progress {
		$this->updatedAt = $updatedAt;
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
     * @return Progress
     */
	public function withRevision(?int $revision): Progress {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Progress {
        if ($data === null) {
            return null;
        }
        return (new Progress())
            ->withProgressId(array_key_exists('progressId', $data) && $data['progressId'] !== null ? $data['progressId'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null)
            ->withGenerated(array_key_exists('generated', $data) && $data['generated'] !== null ? $data['generated'] : null)
            ->withPatternCount(array_key_exists('patternCount', $data) && $data['patternCount'] !== null ? $data['patternCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "progressId" => $this->getProgressId(),
            "uploadToken" => $this->getUploadToken(),
            "generated" => $this->getGenerated(),
            "patternCount" => $this->getPatternCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}