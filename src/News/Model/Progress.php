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


class Progress implements IModel {
	/**
     * @var string
	 */
	private $progressId;
	/**
     * @var string
	 */
	private $uploadToken;
	/**
     * @var int
	 */
	private $generated;
	/**
     * @var int
	 */
	private $patternCount;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getProgressId(): ?string {
		return $this->progressId;
	}
	public function setProgressId(?string $progressId) {
		$this->progressId = $progressId;
	}
	public function withProgressId(?string $progressId): Progress {
		$this->progressId = $progressId;
		return $this;
	}
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
	public function withUploadToken(?string $uploadToken): Progress {
		$this->uploadToken = $uploadToken;
		return $this;
	}
	public function getGenerated(): ?int {
		return $this->generated;
	}
	public function setGenerated(?int $generated) {
		$this->generated = $generated;
	}
	public function withGenerated(?int $generated): Progress {
		$this->generated = $generated;
		return $this;
	}
	public function getPatternCount(): ?int {
		return $this->patternCount;
	}
	public function setPatternCount(?int $patternCount) {
		$this->patternCount = $patternCount;
	}
	public function withPatternCount(?int $patternCount): Progress {
		$this->patternCount = $patternCount;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Progress {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Progress {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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