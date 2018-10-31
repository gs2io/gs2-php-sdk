<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Watch\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetMetricRequest extends Gs2BasicRequest {

    const FUNCTION = "GetMetric";

	/** @var string リソースGRN */
	private $serviceId;

	/** @var string 操作名 */
	private $operation;

	/** @var int データの取得開始日時 */
	private $begin;

	/** @var int データの取得終了日時 */
	private $end;

	/** @var bool 長期間のデータ取得を許可するか */
	private $allowLongTerm;


	/**
	 * リソースGRNを取得
	 *
	 * @return string リソースGRN
	 */
	public function getServiceId() {
		return $this->serviceId;
	}

	/**
	 * リソースGRNを設定
	 *
	 * @param string $serviceId リソースGRN
	 */
	public function setServiceId($serviceId) {
		$this->serviceId = $serviceId;
	}

	/**
	 * リソースGRNを設定
	 *
	 * @param string $serviceId リソースGRN
	 * @return GetMetricRequest
	 */
	public function withServiceId($serviceId): GetMetricRequest {
		$this->setServiceId($serviceId);
		return $this;
	}

	/**
	 * 操作名を取得
	 *
	 * @return string 操作名
	 */
	public function getOperation() {
		return $this->operation;
	}

	/**
	 * 操作名を設定
	 *
	 * @param string $operation 操作名
	 */
	public function setOperation($operation) {
		$this->operation = $operation;
	}

	/**
	 * 操作名を設定
	 *
	 * @param string $operation 操作名
	 * @return GetMetricRequest
	 */
	public function withOperation($operation): GetMetricRequest {
		$this->setOperation($operation);
		return $this;
	}

	/**
	 * データの取得開始日時を取得
	 *
	 * @return int データの取得開始日時
	 */
	public function getBegin() {
		return $this->begin;
	}

	/**
	 * データの取得開始日時を設定
	 *
	 * @param int $begin データの取得開始日時
	 */
	public function setBegin($begin) {
		$this->begin = $begin;
	}

	/**
	 * データの取得開始日時を設定
	 *
	 * @param int $begin データの取得開始日時
	 * @return GetMetricRequest
	 */
	public function withBegin($begin): GetMetricRequest {
		$this->setBegin($begin);
		return $this;
	}

	/**
	 * データの取得終了日時を取得
	 *
	 * @return int データの取得終了日時
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * データの取得終了日時を設定
	 *
	 * @param int $end データの取得終了日時
	 */
	public function setEnd($end) {
		$this->end = $end;
	}

	/**
	 * データの取得終了日時を設定
	 *
	 * @param int $end データの取得終了日時
	 * @return GetMetricRequest
	 */
	public function withEnd($end): GetMetricRequest {
		$this->setEnd($end);
		return $this;
	}

	/**
	 * 長期間のデータ取得を許可するかを取得
	 *
	 * @return bool 長期間のデータ取得を許可するか
	 */
	public function getAllowLongTerm() {
		return $this->allowLongTerm;
	}

	/**
	 * 長期間のデータ取得を許可するかを設定
	 *
	 * @param bool $allowLongTerm 長期間のデータ取得を許可するか
	 */
	public function setAllowLongTerm($allowLongTerm) {
		$this->allowLongTerm = $allowLongTerm;
	}

	/**
	 * 長期間のデータ取得を許可するかを設定
	 *
	 * @param bool $allowLongTerm 長期間のデータ取得を許可するか
	 * @return GetMetricRequest
	 */
	public function withAllowLongTerm($allowLongTerm): GetMetricRequest {
		$this->setAllowLongTerm($allowLongTerm);
		return $this;
	}

}