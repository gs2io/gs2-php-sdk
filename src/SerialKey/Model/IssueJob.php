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


/**
 * Serial Code Issuance Job
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#issuejob
 */
class IssueJob implements IModel {
	/**
     * @var string Issue Job GRN
	 */
	private $issueJobId;
	/**
     * @var string Serial Code Issuance Job name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Quantity of Serial Codes issued
	 */
	private $issuedCount;
	/**
     * @var int Quantity of Serial Codes to issue
	 */
	private $issueRequestCount;
	/**
     * @var string Status
	 */
	private $status;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Issue Job GRN */
	public function getIssueJobId(): ?string {
		return $this->issueJobId;
	}
    /** @param string|null $issueJobId Issue Job GRN */
	public function setIssueJobId(?string $issueJobId) {
		$this->issueJobId = $issueJobId;
	}
    /**
     * @param string|null $issueJobId Issue Job GRN
     * @return IssueJob
     */
	public function withIssueJobId(?string $issueJobId): IssueJob {
		$this->issueJobId = $issueJobId;
		return $this;
	}
    /** @return string|null Serial Code Issuance Job name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Serial Code Issuance Job name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Serial Code Issuance Job name
     * @return IssueJob
     */
	public function withName(?string $name): IssueJob {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return IssueJob
     */
	public function withMetadata(?string $metadata): IssueJob {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Quantity of Serial Codes issued */
	public function getIssuedCount(): ?int {
		return $this->issuedCount;
	}
    /** @param int|null $issuedCount Quantity of Serial Codes issued */
	public function setIssuedCount(?int $issuedCount) {
		$this->issuedCount = $issuedCount;
	}
    /**
     * @param int|null $issuedCount Quantity of Serial Codes issued
     * @return IssueJob
     */
	public function withIssuedCount(?int $issuedCount): IssueJob {
		$this->issuedCount = $issuedCount;
		return $this;
	}
    /** @return int|null Quantity of Serial Codes to issue */
	public function getIssueRequestCount(): ?int {
		return $this->issueRequestCount;
	}
    /** @param int|null $issueRequestCount Quantity of Serial Codes to issue */
	public function setIssueRequestCount(?int $issueRequestCount) {
		$this->issueRequestCount = $issueRequestCount;
	}
    /**
     * @param int|null $issueRequestCount Quantity of Serial Codes to issue
     * @return IssueJob
     */
	public function withIssueRequestCount(?int $issueRequestCount): IssueJob {
		$this->issueRequestCount = $issueRequestCount;
		return $this;
	}
    /** @return string|null Status */
	public function getStatus(): ?string {
		return $this->status;
	}
    /** @param string|null $status Status */
	public function setStatus(?string $status) {
		$this->status = $status;
	}
    /**
     * @param string|null $status Status
     * @return IssueJob
     */
	public function withStatus(?string $status): IssueJob {
		$this->status = $status;
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
     * @return IssueJob
     */
	public function withCreatedAt(?int $createdAt): IssueJob {
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
     * @return IssueJob
     */
	public function withRevision(?int $revision): IssueJob {
		$this->revision = $revision;
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
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}