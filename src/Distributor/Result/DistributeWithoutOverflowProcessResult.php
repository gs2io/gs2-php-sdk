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

class DistributeWithoutOverflowProcessResult implements IResult {
    /** @var DistributeResource */
    private $distributeResource;
    /** @var string */
    private $result;

	public function getDistributeResource(): ?DistributeResource {
		return $this->distributeResource;
	}

	public function setDistributeResource(?DistributeResource $distributeResource) {
		$this->distributeResource = $distributeResource;
	}

	public function withDistributeResource(?DistributeResource $distributeResource): DistributeWithoutOverflowProcessResult {
		$this->distributeResource = $distributeResource;
		return $this;
	}

	public function getResult(): ?string {
		return $this->result;
	}

	public function setResult(?string $result) {
		$this->result = $result;
	}

	public function withResult(?string $result): DistributeWithoutOverflowProcessResult {
		$this->result = $result;
		return $this;
	}

    public static function fromJson(?array $data): ?DistributeWithoutOverflowProcessResult {
        if ($data === null) {
            return null;
        }
        return (new DistributeWithoutOverflowProcessResult())
            ->withDistributeResource(empty($data['distributeResource']) ? null : DistributeResource::fromJson($data['distributeResource']))
            ->withResult(empty($data['result']) ? null : $data['result']);
    }

    public function toJson(): array {
        return array(
            "distributeResource" => $this->getDistributeResource() !== null ? $this->getDistributeResource()->toJson() : null,
            "result" => $this->getResult(),
        );
    }
}