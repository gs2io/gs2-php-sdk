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
 * Request for downloadSerialCodes: Download Serial Codes as a File
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#downloadserialcodes
 */
class DownloadSerialCodesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Campaign Model name */
    private $campaignModelName;
    /** @var string Serial Code Issuance Job name */
    private $issueJobName;
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
     * @return DownloadSerialCodesRequest
     */
	public function withNamespaceName(?string $namespaceName): DownloadSerialCodesRequest {
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
     * @return DownloadSerialCodesRequest
     */
	public function withCampaignModelName(?string $campaignModelName): DownloadSerialCodesRequest {
		$this->campaignModelName = $campaignModelName;
		return $this;
	}
    /** @return string|null Serial Code Issuance Job name */
	public function getIssueJobName(): ?string {
		return $this->issueJobName;
	}
    /** @param string|null $issueJobName Serial Code Issuance Job name */
	public function setIssueJobName(?string $issueJobName) {
		$this->issueJobName = $issueJobName;
	}
    /**
     * @param string|null $issueJobName Serial Code Issuance Job name
     * @return DownloadSerialCodesRequest
     */
	public function withIssueJobName(?string $issueJobName): DownloadSerialCodesRequest {
		$this->issueJobName = $issueJobName;
		return $this;
	}

    public static function fromJson(?array $data): ?DownloadSerialCodesRequest {
        if ($data === null) {
            return null;
        }
        return (new DownloadSerialCodesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCampaignModelName(array_key_exists('campaignModelName', $data) && $data['campaignModelName'] !== null ? $data['campaignModelName'] : null)
            ->withIssueJobName(array_key_exists('issueJobName', $data) && $data['issueJobName'] !== null ? $data['issueJobName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "campaignModelName" => $this->getCampaignModelName(),
            "issueJobName" => $this->getIssueJobName(),
        );
    }
}