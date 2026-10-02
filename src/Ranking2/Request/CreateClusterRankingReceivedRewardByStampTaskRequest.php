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

namespace Gs2\Ranking2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createClusterRankingReceivedRewardByStampTask: Execute record history of cluster ranking rewards received as consume action
 *
 * @see https://docs.gs2.io/api_reference/ranking2/stamp_sheet/#gs2ranking2createclusterrankingreceivedrewardbyuserid
 */
class CreateClusterRankingReceivedRewardByStampTaskRequest extends Gs2BasicRequest {
    /** @var string Consume Action */
    private $stampTask;
    /** @var string Encryption Key GRN */
    private $keyId;
    /** @return string|null Consume Action */
	public function getStampTask(): ?string {
		return $this->stampTask;
	}
    /** @param string|null $stampTask Consume Action */
	public function setStampTask(?string $stampTask) {
		$this->stampTask = $stampTask;
	}
    /**
     * @param string|null $stampTask Consume Action
     * @return CreateClusterRankingReceivedRewardByStampTaskRequest
     */
	public function withStampTask(?string $stampTask): CreateClusterRankingReceivedRewardByStampTaskRequest {
		$this->stampTask = $stampTask;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return CreateClusterRankingReceivedRewardByStampTaskRequest
     */
	public function withKeyId(?string $keyId): CreateClusterRankingReceivedRewardByStampTaskRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateClusterRankingReceivedRewardByStampTaskRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateClusterRankingReceivedRewardByStampTaskRequest())
            ->withStampTask(array_key_exists('stampTask', $data) && $data['stampTask'] !== null ? $data['stampTask'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "stampTask" => $this->getStampTask(),
            "keyId" => $this->getKeyId(),
        );
    }
}