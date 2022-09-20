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

class IssueRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $campaignModelName;
    /** @var string */
    private $metadata;
    /** @var int */
    private $issueRequestCount;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): IssueRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
	public function withCampaignModelName(?string $campaignModelName): IssueRequest {
		$this->campaignModelName = $campaignModelName;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): IssueRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getIssueRequestCount(): ?int {
		return $this->issueRequestCount;
	}
	public function setIssueRequestCount(?int $issueRequestCount) {
		$this->issueRequestCount = $issueRequestCount;
	}
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