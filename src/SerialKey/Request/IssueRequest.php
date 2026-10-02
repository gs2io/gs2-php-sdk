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

namespace Gs2\SerialKey\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for issue: Create Serial Code Issuance Job
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#issue
 */
class IssueRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Campaign Model name */
    private $campaignModelName;
    /** @var string Metadata */
    private $metadata;
    /** @var int Quantity of Serial Codes to issue */
    private $issueRequestCount;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return IssueRequest
     */
	public function withNamespaceName(?string $namespaceName): IssueRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Campaign Model name */
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
    /** @param string|null $campaignModelName Campaign Model name */
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
    /**
     * @param string|null $campaignModelName Campaign Model name
     * @return IssueRequest
     */
	public function withCampaignModelName(?string $campaignModelName): IssueRequest {
		$this->campaignModelName = $campaignModelName;
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
     * @return IssueRequest
     */
	public function withMetadata(?string $metadata): IssueRequest {
		$this->metadata = $metadata;
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
     * @return IssueRequest
     */
	public function withIssueRequestCount(?int $issueRequestCount): IssueRequest {
		$this->issueRequestCount = $issueRequestCount;
		return $this;
	}

    public static function fromJson(?array $data): ?IssueRequest {
        if ($data === null) {
            return null;
        }
        return (new IssueRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCampaignModelName(array_key_exists('campaignModelName', $data) && $data['campaignModelName'] !== null ? $data['campaignModelName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withIssueRequestCount(array_key_exists('issueRequestCount', $data) && $data['issueRequestCount'] !== null ? $data['issueRequestCount'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "campaignModelName" => $this->getCampaignModelName(),
            "metadata" => $this->getMetadata(),
            "issueRequestCount" => $this->getIssueRequestCount(),
        );
    }
}