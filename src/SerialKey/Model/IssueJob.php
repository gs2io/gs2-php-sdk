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

namespace Gs2\SerialKey\Model;

use Gs2\Core\Model\IModel;


class IssueJob implements IModel {
	/**
     * @var string
	 */
	private $issueJobId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $issuedCount;
	/**
     * @var int
	 */
	private $issueRequestCount;
	/**
     * @var string
	 */
	private $status;
	/**
     * @var int
	 */
	private $createdAt;
	public function getIssueJobId(): ?string {
		return $this->issueJobId;
	}
	public function setIssueJobId(?string $issueJobId) {
		$this->issueJobId = $issueJobId;
	}
	public function withIssueJobId(?string $issueJobId): IssueJob {
		$this->issueJobId = $issueJobId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): IssueJob {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): IssueJob {
		$this->metadata = $metadata;
		return $this;
	}
	public function getIssuedCount(): ?int {
		return $this->issuedCount;
	}
	public function setIssuedCount(?int $issuedCount) {
		$this->issuedCount = $issuedCount;
	}
	public function withIssuedCount(?int $issuedCount): IssueJob {
		$this->issuedCount = $issuedCount;
		return $this;
	}
	public function getIssueRequestCount(): ?int {
		return $this->issueRequestCount;
	}
	public function setIssueRequestCount(?int $issueRequestCount) {
		$this->issueRequestCount = $issueRequestCount;
	}
	public function withIssueRequestCount(?int $issueRequestCount): IssueJob {
		$this->issueRequestCount = $issueRequestCount;
		return $this;
	}
	public function getStatus(): ?string {
		return $this->status;
	}
	public function setStatus(?string $status) {
		$this->status = $status;
	}
	public function withStatus(?string $status): IssueJob {
		$this->status = $status;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): IssueJob {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?IssueJob {
        if ($data === null) {
            return null;
        }
        return (new IssueJob())
            ->withIssueJobId(array_key_exists('issueJobId', $data) && $data['issueJobId'] !== null ? $data['issueJobId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withIssuedCount(array_key_exists('issuedCount', $data) && $data['issuedCount'] !== null ? $data['issuedCount'] : null)
            ->withIssueRequestCount(array_key_exists('issueRequestCount', $data) && $data['issueRequestCount'] !== null ? $data['issueRequestCount'] : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? $data['status'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "issueJobId" => $this->getIssueJobId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "issuedCount" => $this->getIssuedCount(),
            "issueRequestCount" => $this->getIssueRequestCount(),
            "status" => $this->getStatus(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}