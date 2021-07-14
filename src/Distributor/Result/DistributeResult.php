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

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\DistributeResource;

class DistributeResult implements IResult {
    /** @var DistributeResource */
    private $distributeResource;
    /** @var string */
    private $inboxNamespaceId;
    /** @var string */
    private $result;

	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}

	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}

	public function withDistributeResource(?DistributeResource $distributeResource): DistributeResult {
		$this->distributeResource = $distributeResource;
		return $this;
	}

	public function getInboxNamespaceId(): ?string {
		return $this->inboxNamespaceId;
	}

	public function setInboxNamespaceId(?string $inboxNamespaceId) {
		$this->inboxNamespaceId = $inboxNamespaceId;
	}

	public function withInboxNamespaceId(?string $inboxNamespaceId): DistributeResult {
		$this->inboxNamespaceId = $inboxNamespaceId;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): DistributeResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeResult {
        if ($data === null) {
            return null;
        }
        return (new DistributeResult())
            ->withDistributeResource(empty($data['distributeResource']) ? null : DistributeResource::fromJson($data['distributeResource']))
            ->withInboxNamespaceId(empty($data['inboxNamespaceId']) ? null : $data['inboxNamespaceId'])
            ->withResult(empty($data['result']) ? null : $data['result']);
    }

    public function toJson(): array {
        return array(
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
            "inboxNamespaceId" => $this->getInboxNamespaceId(),
            "result" => $this->getResult(),
        );
    }
}